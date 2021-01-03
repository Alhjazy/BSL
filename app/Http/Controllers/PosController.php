<?php

namespace App\Http\Controllers;


use App\Models\Branch;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Product;
use App\Models\SalaryPayment;
use App\Models\SalesPayments;
use App\Models\SalesSettings;
use App\Models\SalesTransactionDetails;
use App\Models\SalesTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\ImagickEscposImage;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
use Mike42\Escpos\Printer;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Spatie\PdfToImage\Pdf as img;

class PosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('product_images','category')->where('type','=','PRODUCT')->get();
        $customers = Customer::all();
        return view('pos.index',compact('products','customers'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get_product_json($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['status'=>'success','data'=>$product]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders()
    {
        $orders = SalesTransactions::with('customer','branch')->get();
        $customers = Customer::all();
        return view('sales.list',compact('orders','customers'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders_list()
    {
//        $orders = PurchaseTransactions::with('supplier','branch')->get();
        return view('purchase.list',compact('orders','suppliers'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $customers = Customer::all();
        $branches = Branch::all();
        return view('sales.create',compact('customers','branches'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $sales = SalesTransactions::with('customer','payments','items','branch')->findOrFail($id)->toArray();
        return view('sales.show',compact('sales'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function order_items($id)
    {
        $sales = SalesTransactions::with('items')->findOrFail($id);
        return response()->json($sales->items);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        if($inputs){
            $sales_settings = SalesSettings::where('type','=','RETAIL')->first();
            $SalesOrderLastId = DB::table('sales_transactions')->latest('id')->first() !== null ? DB::table('sales_transactions')->latest('id')->first()->id +1 : 1 ;
            $sales = new SalesTransactions();
            $sales->branch_id = $inputs['branch_id'];
            $sales->customer_id = $inputs['customer_id'];
            $sales->employee_id = 1;
            $sales->reference = $sales_settings->prefix_order.'#'.$sales_settings->sequence_number.$SalesOrderLastId;
            $sales->type = 'POS';
            $sales->issued_date = date('Y-m-d H:i:s');
            $sales->due_date = date('Y-m-d H:i:s');
            $sales->invoice_type = 'POS';
            $sales->total_tax_amount = $inputs['total_tax_amount'];
            $sales->total_discount_amount = $inputs['total_discount_amount'];
            $sales->subtotal = $inputs['subtotal'];
            $sales->total_amount = $inputs['total_amount'];
            $sales->total_balance = $inputs['total_amount'];
            $sales->total_items = count($inputs['items']);
            $sales->total_qty = $inputs['total_qty'];
            $sales->total_due = $inputs['total_due'];
            $sales->outstanding_balance = ($inputs['total_amount'] - $inputs['total_due'] ) ;
            $sales->status = 'IN-PROGRESS';
            if ($sales->outstanding_balance <= 0){
                $sales->status = 'COMPLETE';
            }
            $sales->save();
            $directory = 'resources/core_data/sales/orders/'.$sales->id;
            if (! File::exists($directory)) {
                File::makeDirectory($directory,0777,true);
            }
//            dd($inputs['items']);
            if(is_array($inputs['items']) && !empty($inputs['items'])){
                foreach ($inputs['items'] as $value){
                    $sales_items = new SalesTransactionDetails();
                    $sales_items->sales_transactions_id = $sales->id;
                    $sales_items->product_id = Product::where('sku','=',$value['sku'])->first()->id;
                    $sales_items->customer_id = $inputs['customer_id'];
                    $sales_items->employee_id = 1;
                    $sales_items->qty = $value['qty'];
                    $sales_items->price = $value['price'];
                    $sales_items->discount_value = 0;
                    $sales_items->subtotal = $value['subtotal'];
                    $sales_items->tax_value = $value['total_tax_amount'];
                    $sales_items->total = $value['total_amount'];
                    $sales_items->save();
                }
            }
            if(is_array($inputs['payments']) && !empty($inputs['payments'])){
                foreach ($inputs['payments'] as  $value){
                    $sales_payments = new SalesPayments();
                    $sales_payments->sales_transactions_id = $sales->id;
                    $sales_payments->employee_id = 1;
                    $sales_payments->customer_id = $inputs['customer_id'];
                    $sales_payments->payment_method = $value['payment_method'];
                    $value['payment_method'] === 'CASH' ? $sales_payments->payment_account = 'CASH_ACCOUNT' : $sales_payments->payment_account = 'BANK_ACCOUNT';
                    $reference = DB::table('sales_payments')->latest('id')->first() !== null ? DB::table('sales_payments')->latest('id')->first()->id +1 : 1 ;
                    $sales_payments->reference = 'PYT-'.$reference;
                    $sales_payments->amount = $value['amount'];
                    $sales_payments->outstanding_balance = $value['outstanding_balance'];
                    $sales_payments->date = $value['date'];
                    $sales_payments->status = $value['status'];
                    $sales_payments->save();
                }
            }
            $this->pos_invoice($sales->id);
            return response()->json(['status' => 'success', 'data' => $sales]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pos_invoice($id)
    {
        $order = SalesTransactions::with('payments','items','customer','branch')->findOrFail($id)->toArray();
        $pdfile = 'resources/core_data/sales/orders/'.$order['id'].'/invoice.pdf';
        $countItems = count($order['items']);
        $length = 200;
        for ($x = 0; $x <= $countItems; $x++) {
            $length += 50;
        }
        $format = [300, $length];

        $pdf = PDF::loadView('pos.invoice', compact('order'), [], [
            'format' => $format,
        ]);
        $pdf->save($pdfile);
        $connector = new CupsPrintConnector('gezhiweixin_micro_printer',631);
        $printer = new Printer($connector);
        $printer->setPrintLeftMargin(0);
        $pages = ImagickEscposImage::load($pdfile);
        try {
            $printer->bitImageColumnFormat($pages);
        } catch (Exception $e) {
            /*
               * loadPdf() throws exceptions if files or not found, or you don't have the
               * imagick extension to read PDF's
               */
//            echo $e -> getMessage() . "\n";
        } finally {
            $printer -> close();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customer_store(Request $request)
    {
        $input = $request->all();
        $customer = Customer::create($input);
        $directory = 'resources/core_data/customers/'.$customer->id;
        if (! File::exists($directory)) {
            File::makeDirectory($directory,0777,true);
        }
        return response()->json(['status' => 'success','data' => $customer]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customer_list_json()
    {
        $customers = Customer::all();
        return response()->json(['status' => 'success','data' => $customers]);
    }



}
