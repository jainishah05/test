<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use App\User;
use App\DeliveryAddress;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = config('constants.page');

        if (!empty($keyword)) {
            $orders = Order::with('orders')->where('created_at', 'LIKE', "%$keyword%")
                ->orWhere('firstname', 'LIKE', "%$keyword%")
                ->orWhere('lastname', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('grand_total', 'LIKE', "%$keyword%")
                ->orWhere('order_status', 'LIKE', "%$keyword%")
                ->orWhere('payment_method', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $orders = Order::latest()->paginate($perPage);
        }

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetails = Order::with('orders')->where('id',$id)->first();
        $userDetails = User::where('id',$orderDetails->user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$orderDetails->user_id)->first();
        $productDetails = OrderProduct::where('order_id',$orderDetails->id)->get();
        return view('admin.order.show', compact('orderDetails','userDetails','shippingDetails','productDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update Order Status
        $orderDetails = Order::where('id',$id)->first();
        if ($request->order_status == "Cancelled") {  
            Order::where('id',$id)->update(['order_status' => $request->order_status,'payment_status' => 'Failed']);
        }
        elseif ($request->order_status == "Delivered") {
           Order::where('id',$id)->update(['order_status' => $request->order_status,'payment_status' => 'Successful']);
        }
        else
        {
            Order::where('id',$id)->update(['order_status' => $request->order_status]);        
        }

        //send Order status changed mail to user
        $email = emailTemplate('order_status');
        $email->message = str_replace("{SITE_NAME}",'ShoppingCart',$email->message);
        $email->message = str_replace("{STATUS}",$request->order_status,$email->message);
        $email->subject = str_replace("{STATUS}",$request->order_status,$email->subject);
           
        $emailData = [
            'email' => $orderDetails->email,
            'subject' => $email->subject,
            'mess' => $email->message
        ];
        $mailctrl = new MailController();
        $mailctrl->success_email($emailData);

        return redirect()->back()->with('flash_message_success','Order status has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
