<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Coupon;
use App\Order;
use App\OrderProduct;
use App\DeliveryAddress;
use Session;

class ReportController extends Controller
{
	private $perPage = 5;
	public function report(Request $request)
    {
		return view('admin.reports.report');
    }

    public function userReport(Request $request)
    {
		$userReport = User::where('role','Customer')->latest()->paginate($this->perPage);
		return view('admin.reports.userReport',compact('userReport'));
    }

    public function couponReport(Request $request)
    {
		$couponReport = Coupon::latest()->paginate($this->perPage);
		$Order = Order::all();
		return view('admin.reports.couponReport',compact('couponReport','Order'));
    }

    public function Order($id)
    {
		$Orders = Order::where('user_id',$id)->latest()->paginate($this->perPage);
		return view('admin.reports.Orders',compact('Orders'));
    }

	public function filterReport(Request $request)
    {
    	if(!is_null($request->datefilter) && $request->user == 'user') 
    	{
    		$date = $request->datefilter;
	    	$parts = explode(' - ' , $request->datefilter);
	        $date_from = $parts[0];
	        $date_to = $parts[1];
	    	$userReport = User::where('role','Customer')->whereDate('created_at', '>=', date('Y-m-d', strtotime($date_from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($date_to)))->orderBy('created_at')->latest()->paginate($this->perPage);
	    	Session::put('userfilter','success');
	    	return view('admin.reports.userReport',compact('userReport','date'));
	    }
	    if (!empty($request->userfiltercancle) && $request->userfiltercancle == "Cancle")
	    {
	    	Session::forget('userfilter');
	    	$userReport = User::where('role','Customer')->latest()->paginate($this->perPage);
			return view('admin.reports.userReport',compact('userReport'));
	    }

	    if(!is_null($request->datefilter) && $request->coupon == 'coupon') 
    	{
    		$date = $request->datefilter;
	    	$parts = explode(' - ' , $request->datefilter);
	        $date_from = $parts[0];
	        $date_to = $parts[1];
	    	$couponReport = Coupon::whereDate('created_at', '>=', date('Y-m-d', strtotime($date_from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($date_to)))->orderBy('created_at')->latest()->paginate($this->perPage);
	    	$Order = Order::all();
	    	Session::put('couponfilter','success');
			return view('admin.reports.couponReport',compact('couponReport','date','Order'));
	    }
	    if (!empty($request->couponfiltercancle) && $request->couponfiltercancle == "Cancle")
	    {
	    	Session::forget('couponfilter');
	    	$couponReport = Coupon::latest()->paginate($this->perPage);
	    	$Order = Order::all();
			return view('admin.reports.couponReport',compact('couponReport','Order'));
	    }
    }

}
