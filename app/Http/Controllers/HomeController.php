<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $users = User::all();
        return view('home',compact("users"));
    }

    public function newIndex()
    {
        return view('admin.template.admin_master');
    }

    public function userIndex()
    {
        $users = User::all();
        return view('admin.users.index',compact("users"));
    }
}
