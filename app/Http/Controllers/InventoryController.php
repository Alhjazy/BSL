<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeesRole;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use App\Models\Salary;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class InventoryController extends Controller
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
        $products = Product::with('product_images','category')->paginate(10);
        $categories = ProductCategory::all();
        return view('inventory.products.list',compact('products','categories'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_category_register(Request $request)
    {
        $input = $request->all();
        $categories = ProductCategory::create($input);
        return response()->json(['status'=> 'success','message' => 'The Product Category ('.$categories->name.') Has Been Registered Successfully!']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_create()
    {
//        $employees = Employee::with('department','role')->get();
        $categories = ProductCategory::all();
        return view('inventory.products.register',compact('categories'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_find($id)
    {
//        $employees = Employee::with('department','role')->get();
        $product = Product::with('product_images','category')->where('barcode','=',$id)
            ->orWhere('sku','=',$id)->get();
        return response()->json(['status' => 'success','data' => $product]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function supplier_store(Request $request)
    {
        $input = $request->all();
        $supplier = Supplier::create($input);
        $directory = 'resources/core_data/suppliers/'.$supplier->id;
        if (! File::exists($directory)) {
            File::makeDirectory($directory,0777,true);
        }
        return response()->json(['status' => 'success','data' => $supplier]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function supplier_list_json()
    {
        $suppliers = Supplier::all();
        return response()->json(['status' => 'success','data' => $suppliers]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_store(Request $request)
    {
        $input = $request->all();
        $lastId = DB::table('products')->latest('id')->first();
        $lastId === null ? $lastId = 1 : $lastId = $lastId->id + 1;
        $input['sku'] = 'SKU000'.$lastId;

        $directory = 'resources/products/'.$input['sku'];
        if (! File::exists($directory)) {
            File::makeDirectory($directory,0777,true);
        }

        $product = Product::create($input);

        //upload products images
        if($request->hasFile('product_images')){
            $product_images = $request->file('product_images');
            foreach($product_images as $key => $file){
                $name = 'product_image_'.$input['sku'].'_'.$key.'.'.$file->getClientOriginalExtension();;
                $file->move($directory.'/images',$name);
                /*Insert your data*/
                ProductImages::create([
                    'product_id' => $product->id,
                    'name' => $name,
                    'image' => $directory.'/images/'.$name,
                    'slug' => $key,
                    'description' => null,
                    'status' =>'Active',
                ]);
            }

        }

        return redirect()->to('/inventory/products');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_update($id , Request $request)
    {
        $product = Product::with('product_images','category')->findOrFail($id);
        $input = $request->all();
        $input['sku'] = $product->sku;
        $directory = 'resources/products/'.$input['sku'];
        if (! File::exists($directory)) {
            File::makeDirectory($directory,0777,true);
        }

        $product->update($input);

        //upload products images
        if($request->hasFile('product_images')){
            $product_images = $request->file('product_images');
            foreach($product_images as $key => $file){
                $name = 'product_image_'.$input['sku'].'_'.$key.'.'.$file->getClientOriginalExtension();;
                $file->move($directory.'/images',$name);
                /*Insert your data*/
                ProductImages::create([
                    'product_id' => $product->id,
                    'name' => $name,
                    'image' => $directory.'/images/'.$name,
                    'slug' => $key,
                    'description' => null,
                    'status' =>'Active',
                ]);
            }

        }

        return redirect()->to('/inventory/products');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_edit($id)
    {
        $product = Product::with('product_images','category')->findOrFail($id);
        $categories = ProductCategory::all();
        return view('inventory.products.edit',compact('product','categories'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_images_delete($id)
    {
        $image = ProductImages::findOrFail($id);
        $image->delete();
        return response()->json(['status' => 'success','message' => 'Product Image Has Been Deleted Successfully!']);
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $lastId = DB::table('employees')->latest('id')->first()->id + 1;
        $input['username'] = 'EMP000'.$lastId;
        $input['password'] = Hash::make('abc123');

        $directory = 'resources/employees/profiles/'.$input['username'];
        if (! File::exists($directory)) {
            File::makeDirectory($directory,0777,true);
        }
        //upload personal/profile image
        $personal_image = $request->file('personal_image');
        if ($personal_image->isValid()) {
            $fileName = 'personal_image_'.$input['username'].'.'.$personal_image->getClientOriginalExtension();
            $personal_image->move('resources/employees/profiles/'.$input['username'], $fileName);
            $input['personal_image'] = $fileName;
            $input['profile_image'] = $fileName;
        }
        //upload ID Copy File
        $id_file = $request->file('id_file');
        if ($id_file->isValid()) {
            $fileName = 'id_file_'.$input['username'].'.'.$id_file->getClientOriginalExtension();
            $id_file->move('resources/employees/profiles/'.$input['username'], $fileName);
            $input['id_file'] = $fileName;
        }
        //upload Contract Copy File
        $contract_file = $request->file('contract_file');
        if ($contract_file->isValid()) {
            $fileName = 'contract_file_'.$input['username'].'.'.$contract_file->getClientOriginalExtension();
            $contract_file->move('resources/employees/profiles/'.$input['username'], $fileName);
            $input['contract_file'] = $fileName;
        }
        //upload Passport Copy File
        $passport_file = $request->file('passport_file');
        if ($passport_file->isValid()) {
            $fileName = 'passport_file_'.$input['username'].'.'.$passport_file->getClientOriginalExtension();
            $passport_file->move('resources/employees/profiles/'.$input['username'], $fileName);
            $input['passport_file'] = $fileName;
        }
        //upload Bank Proof Account Copy File
        $bank_file = $request->file('bank_file');
        if ($bank_file->isValid()) {
            $fileName = 'bank_file_'.$input['username'].'.'.$bank_file->getClientOriginalExtension();
            $bank_file->move('resources/employees/profiles/'.$input['username'], $fileName);
            $input['bank_file'] = $fileName;
        }
        $employee = Employee::create($input);

        $EmpSalary = new Salary();
        $EmpSalary->employee_id     = $employee->id;
        $EmpSalary->basic           = $input['salary_basic'];
//        $EmpSalary->flaying_tickets = $input['salary_flaying_Tickets'] ? $input['salary_flaying_Tickets'] : 0;
        $EmpSalary->gas             = $input['salary_gas'];
        $EmpSalary->transport       = $input['salary_transport'];
        $EmpSalary->housing         = $input['salary_housing'];
        $EmpSalary->mobile          = $input['salary_mobile'];
        $EmpSalary->other_benefits  = $input['salary_other_benefits'];
//        $EmpSalary->description     = $input['salary_description'];
        $EmpSalary->status          = $input['salray_status'];

        $EmpSalary->save();

        return response()->json(['status' => 'success','EMPID' => $employee->id]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function company_info()
    {
        $info = Company::all()->toArray();
        return view('settings.company',compact('info'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function company_info_edit(Request $request)
    {
        $input = $request->all();
        $id = 1;
        $company = Company::findOrFail($id);
        $company->update([$input['name'] => $input['value']]);
        return response()->json($company);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function departments()
    {
        $department = Department::with('parents')->get();
        return view('settings.departments',compact('department'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function branchs()
    {
        $branch = Branch::all();
        return view('settings.branchs',compact('branch'));
    }
}
