<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    // Admin Dashboard
    public function adminDashboard(){
        Session::put('admin_page', 'dashboard');
        return view ('admin.dashboard');
    }
}
