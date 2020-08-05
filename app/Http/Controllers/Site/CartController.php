<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use Alert;
use Cart;
use Session;
use Auth;
use App\Product;
use App\ShoppingCart;

class CartController extends Controller
{
	public function index()
    {
        Session::forget('couponDiscount');
        Session::forget('couponCode');
        $cartCollection = Cart::content();
        return view('site.cart.index')->with(['cartCollection' => $cartCollection]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'size' => 'required'
        ]);

        Cart::add([
        'id' => $request->id, 
        'name' => $request->name, 
        'price' => $request->price, 
        'qty' => $request->quantity,  
        'weight' => 0, 

        'options' => [
            'image' => $request->img,
            'user_id' => Auth::user()->id,
            'p_code' => $request->p_code,
        	'description' => $request->description,
            'size' => explode('-', $request->size)
        ]

        ]);

        return redirect()->back()->with('success', 'Added to cart!');
    }

    public function show(Request $request)
    {
    	//
    }

    public function edit(Request $request,$id)
    {
        $qty = Cart::get($id)->qty;
        Cart::update($id,$qty-1);
        return redirect()->back()->with('flash_message_success','Item quantity updated successfully!');
    }

    public function update(Request $request, $id)
    {
        $qty = Cart::get($id)->qty;
        Cart::update($id,$qty+1);
        return redirect()->back()->with('flash_message_success','Item quantity updated successfully!');
    }

    public function destroy($id)
    {
        
        Cart::remove($id);
        return redirect()->back()->with('delete_success', 'Item has been removed successfully!');
    }
}
