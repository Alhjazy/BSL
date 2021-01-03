<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sidebar_menu($id)
    {

        switch ($id) {
            case "dashboard":
                return view('sidebar_menu.dashboard');
                break;
            case "hrms":
                return view('sidebar_menu.hrms');
                break;
            default:
                return view('sidebar_menu.dashboard');
        }
//        return view('sidebar_menu.dashboard');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sidebar_menu_items($id)
    {

        switch ($id) {
            case "employee":
                return view('sidebar_menu_items.employee');
                break;
            case "hrms":
                return view('sidebar_menu.hrms');
                break;
            default:
                return view('sidebar_menu.dashboard');
        }
//        return view('sidebar_menu.dashboard');
    }
}
