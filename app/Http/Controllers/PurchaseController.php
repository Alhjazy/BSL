<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Department;
use App\Models\Product;
use App\Models\PurchaseDocuments;
use App\Models\PurchasePayments;
use App\Models\PurchaseSettings;
use App\Models\PurchaseTransactionDetails;
use App\Models\PurchaseTransactions;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PurchaseController extends Controller
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
        return view('purchase.index');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders()
    {
        $orders = PurchaseTransactions::with('supplier','branch')->get();
        $suppliers = Supplier::all();
        return view('purchase.list',compact('orders','suppliers'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders_list()
    {
        $orders = PurchaseTransactions::with('supplier','branch')->get();
        return view('purchase.list',compact('orders','suppliers'));
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('purchase.create',compact('suppliers'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $purchase = PurchaseTransactions::with('supplier','payments','items','documents')->findOrFail($id)->toArray();
        return view('purchase.show',compact('purchase'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function order_items($id)
    {
        $purchase = PurchaseTransactions::with('items')->findOrFail($id);
        return response()->json($purchase->items);
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
            $purchase_settings = PurchaseSettings::where('type','=','MAIN')->first();
            $purchaseOrderLastId = DB::table('purchase_transactions')->latest('id')->first() !== null ? DB::table('purchase_transactions')->latest('id')->first()->id +1 : 1 ;
            $purchase = new PurchaseTransactions();
            $purchase->branch_id = 1;
            $purchase->supplier_id = $inputs['supplier_id'];
            $purchase->employee_id = 1;
            $purchase->reference = $purchase_settings->prefix_order.'_'.$purchase_settings->sequence_number.$purchaseOrderLastId;
            $purchase->type = 'Purchase_Order';
            $purchase->invoice_no = $inputs['invoice_no'];
            $purchase->invoice_type = $inputs['invoice_type'];
            $purchase->issued_date = $inputs['issued_date'];
            $purchase->due_date = $inputs['due_date'];
            $purchase->total_tax_amount = $inputs['total_tax_amount'];
            $purchase->total_discount_amount = $inputs['discount_value'];
            $purchase->subtotal = $inputs['subtotal'];
            $purchase->total_amount = $inputs['total_amount'];
            $purchase->total_balance = $inputs['total_amount'];
            $purchase->total_items = count($inputs['items']);
            $purchase->total_qty = $inputs['total_qty'];
            $purchase->total_due = $inputs['total_due'];
            $purchase->outstanding_balance = ($inputs['total_amount'] - $inputs['total_due'] ) ;
            $purchase->status = 'IN-PROGRESS';
            if ($purchase->outstanding_balance === 0){
                $purchase->status = 'COMPLETE';
            }
            $purchase->save();
            $directory = 'resources/core_data/Purchases/orders/'.$purchase->id;
            if (! File::exists($directory)) {
                File::makeDirectory($directory,0777,true);
            }
//            dd($inputs['items']);
            if(is_array($inputs['items']) && !empty($inputs['items'])){
                foreach ($inputs['items'] as $value){
                    $purchase_items = new PurchaseTransactionDetails();
                    $purchase_items->purchase_transactions_id = $purchase->id;
                    $purchase_items->product_id = Product::with('product_images','category')->where('sku','=',$value['sku'])->first()->id;
                    $purchase_items->supplier_id = $inputs['supplier_id'];
                    $purchase_items->employee_id = 1;
                    $purchase_items->qty = $value['qty'];
                    $purchase_items->price = $value['price'];
                    $purchase_items->discount_value = $value['discount_value'];
                    $purchase_items->subtotal = $value['subtotal'];
                    $purchase_items->tax_value = $value['total_tax_amount'];
                    $purchase_items->total = $value['total_amount'];
                    $purchase_items->save();
                }
            }
            if(is_array($inputs['payments']) && !empty($inputs['payments'])){
                foreach ($inputs['payments'] as  $value){
                    $purchase_payments = new PurchasePayments();
                    $purchase_payments->purchase_transactions_id = $purchase->id;
                    $purchase_payments->employee_id = 1;
                    $purchase_payments->supplier_id = $inputs['supplier_id'];
                    $purchase_payments->payment_method = $value['payment_method'];
                    $value['payment_method'] === 'CASH' ? $purchase_payments->payment_account = 'CASH_ACCOUNT' : $purchase_payments->payment_account = 'BANK_ACCOUNT';
                    $reference = DB::table('purchase_payments')->latest('id')->first() !== null ? DB::table('purchase_payments')->latest('id')->first()->id +1 : 1 ;
                    $purchase_payments->reference = 'PYT-'.$reference;
                    $purchase_payments->amount = $value['amount'];
                    $purchase_payments->outstanding_balance = $value['outstanding_balance'];
                    $purchase_payments->date = $value['date'];
                    $purchase_payments->status = $value['status'];
                    $purchase_payments->save();
                }
            }

            if(is_array($inputs['documents']) && !empty($inputs['documents'])){
                foreach ($inputs['documents'] as  $value){
                    $purchase_documents = new PurchaseDocuments();
                    if($value['file']){
                        $fileName = 'PurchaseOrderFile_'.$purchase->id.'.'.$value['file']->getClientOriginalExtension();
                        $value['file']->move($directory.'/'.$purchase->id, $fileName);
                    }
                    $purchase_documents->purchase_transactions_id = $purchase->id;
                    $purchase_documents->employee_id = 1;
                    $purchase_documents->type = $value['type'];
                    $purchase_documents->name = $value['name'];
                    $purchase_documents->file = $fileName;
                    $purchase_documents->remarks = $value['remarks'];
                    $purchase_documents->save();
                }
            }
            return response()->json(['status' => 'success', 'data' => $purchase]);
        }
    }

}
