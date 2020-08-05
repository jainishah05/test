<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Order;
use App\ContactUs;

class DashboardController extends Controller
{
    public function dashboard()
    {
    	$userCount = User::where('role','=','Customer')->count();
    	$orderCount = Order::count();
    	$contactUsCount = ContactUs::count();
    	return view('admin.adminpage',compact('userCount','orderCount','contactUsCount'));
    }
}
