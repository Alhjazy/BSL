<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;

class SettingsController extends Controller
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
        return view('settings.home');
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
