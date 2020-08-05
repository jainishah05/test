<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Coupon;
use App\Country;
use App\User;
use App\Order;
use App\OrderProduct;
use App\ProductImage;
use App\ProductAttribute;
use App\DeliveryAddress;
use App\ShoppingCart;
use App\CartItem;
use Cart;
use Auth;
use Session;
use Stripe;
use DB;
use View;
use Exception;

class ProductController extends Controller
{
	public function __construct()
	{
        // Sharing categories object to all views
        $categories = Category::all();
        View::share('categories', $categories);

		// $this->middleware('auth');
	}
    
    public function displayProducts(Request $request)
    {
        $perPage = 3;
    	$Feature_product = Product::where('featured','on')->paginate($perPage); //here,we can also use simplePaginate() method,instead of paginate method.simplePaginate() use only prev & next buttons.
        $categoryProduct = Category::with('products')->where('id',$request->category_id)->get();
        return view('site.product',compact('Feature_product','categoryProduct'));
    }

    public function productDetail($id = null,Request $request)
    {
        //Get Product Details
        $productDetail = Product::with('attributes')->where('id',$id)->first();
        $productImage = ProductImage::where('product_id',$id)->get();
        $products = Product::all();
        return view('site.productDetail',compact('productDetail','products','productImage'));
    }

    public function getProductPrice(Request $request)
    {
        //Get ProductPrice as per size
        $data = $request->idSize;
        // echo "<pre>"; print_r($data); die;
        $proArr = explode("-",$data);
        $proAttr = ProductAttribute::where(['product_id' => $proArr[0],'attribute_value' => $proArr[1]])->first();
        echo $proAttr->price;
    }


    public function applyCoupon(Request $request)
    {
        if(count(Cart::instance('shopping')->content()) == 0)
        {
            return redirect()->back()->with('flash_message_error','Please add some items into cart!');
        }

       $couponCount = Coupon::where('coupon_code',$request->coupon_code)->count();
       if ($couponCount == 0) {
           return redirect()->back()->with('flash_message_error','Coupon does not exits!');
       } 
       else 
       {
            #perform other checks like Active/Inactive,Expiry Date..
            
            #Get Coupon Details
            $couponDetails = Coupon::where('coupon_code',$request->coupon_code)->first();

            #if coupon is Inactive
            if ($couponDetails->status == 0 ) {
                return redirect()->back()->with('flash_message_error','This Coupon is not active!');
            }

            #Total amount
            $totalamount = str_replace(' ', '', Cart::subtotal(0,' ',' '));

            #if coupon is Expired
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');  

            if ($expiry_date < $current_date) {
                return redirect()->back()->with('flash_message_error','This Coupon is expired!');
            } 

            #Coupon is valid for discount

            #check if amount type is Fixed or Percentage
            if ($couponDetails->amount_type == 'fixed') {
                $couponAmount = $couponDetails->amount;
            } else {
                $couponAmount = round($totalamount*($couponDetails->amount/100));
            }

            Session::put('couponAmount',$couponAmount);
            Session::put('couponCode',$request->coupon_code);
            return redirect()->back()->with(['flash_message_success' => 'Coupon code successfully applied.You are availing discount']);
        } 
    }

    public function checkout(Request $request)
    {
        if(count(Cart::instance('shopping')->content()) == 0)
        {
            return redirect()->back()->with('flash_message_error','Please add some items into cart to checkout!');
        }

        $countries = Country::all();
        $user_id = Auth::user()->id;
        $userDetails = User::findOrFail($user_id);
        $email = $userDetails->email;
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = array();

        if($shippingCount > 0)
        {
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        if($request->isMethod('post'))
        {
            $data = $request->all();

            //Return to checkout page if any of the field is empty
            if(empty($data['billing_firstname']) || empty($data['billing_lastname']) || empty($data['billing_address']) || empty($data['billing_city']) || empty($data['billing_state']) || empty($data['billing_country']) || empty($data['billing_pincode']) || empty($data['billing_mobile']) || empty($data['shipping_firstname']) || empty($data['shipping_lastname']) || empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_state']) || empty($data['shipping_country']) || empty($data['shipping_pincode']) || empty($data['shipping_mobile']))
            {
                return redirect()->back()->with('flash_message_error','Please fill all fields to checkout!');
            }
            
            //Update user details(add billing address)
            User::where('id',$user_id)->update(['firstname' => $data['billing_firstname'],'lastname' => $data['billing_lastname'],'address' => $data['billing_address'],'city'  => $data['billing_city'],'state' => $data['billing_state'],'country' => $data['billing_country'],'pincode' => $data['billing_pincode'],'mobile' => $data['billing_mobile']]);

            //Shipping Address
            if($shippingCount > 0)
            {
                //Update Shipping Address
                DeliveryAddress::where('user_id',$user_id)->update(['firstname' => $data['shipping_firstname'],'lastname' => $data['shipping_lastname'],'address' => $data['shipping_address'],'city'  => $data['shipping_city'],'state' => $data['shipping_state'],'country' => $data['shipping_country'],'pincode' => $data['shipping_pincode'],'mobile' => $data['shipping_mobile']]);
            }
            else
            {
                //Add Shipping Address
                $shipping = new DeliveryAddress();
                $shipping->user_id = $user_id;
                $shipping->email = $email;
                $shipping->firstname = $data['shipping_firstname'];
                $shipping->lastname = $data['shipping_lastname'];
                $shipping->address = $data['shipping_address'];
                $shipping->city = $data['shipping_city'];
                $shipping->state = $data['shipping_state'];
                $shipping->country = $data['shipping_country'];
                $shipping->pincode = $data['shipping_pincode'];
                $shipping->mobile = $data['shipping_mobile'];
                $shipping->save();
            }
           return redirect('/order-review');
        }
        
        return view('site.cart.checkout',compact('userDetails','countries','shippingDetails'));
    }

    public function orderReview()
    {
        $user_id = Auth::user()->id;
        $userDetails = User::findOrFail($user_id);
        $cartCollection = Cart::instance('shopping')->content();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();

        return view('site.cart.orderReview',compact('userDetails','shippingDetails','cartCollection'));
    }

    public function placeOrder(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $errorStatus = 'false';
            $contents = Cart::instance('shopping')->content()->map(function ($item){
                return $item->name.'-'. $item->qty;
            })->values()->toJson();
            
            //stripe payment
            if($data['payment_method'] == 'Stripe')
            {  
                try
                { 
                    // Set your secret key. Remember to switch to your live secret key in production!
                    // Stripe::setApiKey('sk_test_51H97j3D686xZgEvw1QO1sY94mhQQAQE5mbgpkYNBy3ZFeoKi9rHUnAUrVkOaX9AEWqgKmYIzkWhH9hWlMVJhVlT700VtCCV25s');

                    //get the payment token ID submitted by the form
                    $chargedata = Stripe::charges()->create([
                      'amount' => $data['grand_total'],
                      'currency' => 'INR',
                      'source' => $data['stripeToken'],
                      'description' => 'Order',
                      'receipt_email' => $user_email,
                      'metadata' => [
                        'contents' => $contents
                        ],
                    ]);
                }
                 catch(\Cartalyst\Stripe\Exception\CardErrorException $e)
                {
                    //get shipping address of user
                    $shipping = DeliveryAddress::where('user_id',$user_id)->first();
                    //check that coupon is applied or not
                    if(is_null($data['coupon_code']))
                    {
                        $data['coupon_code'] ='';
                        $data['coupon_amount'] = 0;
                    }
                    //add data in orders table
                    $order = new Order;
                    $order->user_id = $user_id;
                    $order->firstname = $shipping->firstname;
                    $order->lastname = $shipping->lastname;
                    $order->email = $shipping->email;
                    $order->address = $shipping->address;
                    $order->city = $shipping->city;
                    $order->state = $shipping->state;
                    $order->country = $shipping->country;
                    $order->pincode = $shipping->pincode;
                    $order->mobile = $shipping->mobile;
                    //Just Placed an order,so status is consider as new
                    $order->order_status = "New";
                    $order->payment_method = $data['payment_method'];
                    $order->payment_status = 'Failed';
                    $order->payment_error = $e->getMessage();
                    $order->coupon_code = $data['coupon_code'];
                    $order->coupon_amount = $data['coupon_amount'];
                    $order->grand_total = $data['grand_total'];
                    $order->save();
                    return redirect()->back()->with('flash_message_error',$e->getMessage());
                }

            }
    
            //get shipping address of user
            $shipping = DeliveryAddress::where('user_id',$user_id)->first();

            //check that coupon is applied or not
            if(is_null($data['coupon_code']))
            {
                $data['coupon_code'] ='';
                $data['coupon_amount'] = 0;
            }

            //payment method
            if(!$request->payment_method)
            {
                return redirect()->back()->with('flash_message_error','Please select payment option!');
            }

            //add data in orders table
            $order = new Order;
            $order->user_id = $user_id;
            $order->firstname = $shipping->firstname;
            $order->lastname = $shipping->lastname;
            $order->email = $shipping->email;
            $order->address = $shipping->address;
            $order->city = $shipping->city;
            $order->state = $shipping->state;
            $order->country = $shipping->country;
            $order->pincode = $shipping->pincode;
            $order->mobile = $shipping->mobile;
            //Just Placed an order,so status is consider as new
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            if($data['payment_method'] == "Stripe") {
                $order->payment_status = 'Successful';
            }
            else
            {
                $order->payment_status = 'Pending';
            }
            $order->coupon_code = $data['coupon_code'];
            $order->coupon_amount = $data['coupon_amount'];
            $order->grand_total = $data['grand_total'];
            $order->save();

            //add data in product_orders table
            $order_id = DB::getPdo()->lastInsertId();
            $cartProducts = Cart::instance('shopping')->content();
            foreach ($cartProducts as $pro) 
            {
                //store details to order table
                $orderPro = new OrderProduct;
                $orderPro->order_id = $order_id;
                $orderPro->user_id = $user_id;
                $orderPro->product_id = $pro->id;
                $orderPro->product_code = $pro->options->p_code;
                $orderPro->product_image = $pro->options->image;
                $orderPro->product_name = $pro->name;
                $orderPro->product_price = $pro->price;
                $orderPro->product_qty = $pro->qty;
                $orderPro->product_size = $pro->options->size[1];
                $orderPro->save();

            }

            //send successful Order mail to user
            $email = emailTemplate('order_placed');
            $email->message = str_replace("{SITE_NAME}",'ShoppingCart',$email->message);
           
            $emailData = [
                'email' => Auth::user()->email,
                'subject' => $email->subject,
                'mess' => $email->message
            ];
            $mailctrl = new MailController();
            $mailctrl->success_email($emailData);

            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);
            return redirect('/thanks');
        }
    }

    public function thanks(Request $request)
    {
        $cartProducts = Cart::instance('shopping')->content();
        foreach ($cartProducts as $pro) 
        {
            //decrease quantity
            $quantity = ProductAttribute::where(['product_id' => $pro->id, 'attribute_value' => $pro->options->size[1]])->first();
            $proQty = (int)$pro->qty;
            $updateQty = $quantity->quantity - $proQty;
            ProductAttribute::where(['product_id' => $pro->id, 'attribute_value' => $pro->options->size[1]])->update(['quantity' => $updateQty]);

            //delete items from cart table
            CartItem::where(['product_id' => $pro->id, 'product_size' => $pro->options->size[0].'-'.$pro->options->size[1]])->delete();
        }
        Session::forget('couponDiscount');
        Session::forget('couponCode');
        Cart::instance('shopping')->destroy();
        return view('site.cart.thanks');
    }

    public function userOrders()
    {
        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where('user_id',$user_id)->get();
        return view('site.cart.userOrders',compact('orders'));
    }

    public function userOrderDetails($order_id)
    {
        $user_id = Auth::user()->id;
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        return view('site.cart.userOrderDetails',compact('orderDetails'));
    }
}
