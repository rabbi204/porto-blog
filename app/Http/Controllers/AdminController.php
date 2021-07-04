<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     *  Show Admin Login form
     */
    public function showAdminLoginForm()
    {
       return view('admin.login');
    }
    
    /**
     *  Show Admin Register Form
     */
    public function showAdminRegisterForm()
    {
       return view('admin.register');
    }
        
    /**
     *  Show Admin page show
     */
    public function showAdminDashboard()
    {
       return view('admin.dashboard');
    }



}
