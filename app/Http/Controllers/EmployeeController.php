<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeesRole;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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
        $employees = Employee::with('department','role')->paginate(10);
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
//        $employees = Employee::with('department','role')->get();
        $departments = Department::all();
        $roles = EmployeesRole::all();
        return view('employee.register',compact('departments','roles'));
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
    public function show($id)
    {
        $employee = Employee::with('department','role')->findOrFail($id);
//        dd($employee);
        $employees = Employee::with('department','role')->get();
        return view('employee.show',compact('employee','employees'));
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
