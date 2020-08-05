<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use Alert;
use Cart;
use Session;
use Auth;
use View;
use App\Product;
use App\ShoppingCart;
use App\CartItem;
use App\Category;

class CartController extends Controller
{
    public function __construct()
    {
        // Sharing categories object to all views
        $categories = Category::all();
        View::share('categories', $categories);
    }

	public function index()
    {
        Session::forget('couponDiscount');
        Session::forget('couponCode');
        $cartCollection = Cart::instance('shopping')->content();
        if(Auth::check())
        {
            //Old Cart
            $oldcart = CartItem::where('user_id',Auth::user()->id)->get();
            if(count($cartCollection) == 0)
            {
                foreach ($oldcart as $cart) 
                { 
                    Cart::instance('shopping')->add([
                        'id' => $cart['product_id'], 
                        'name' => $cart['product_name'], 
                        'price' => $cart['product_price'], 
                        'qty' => $cart['product_qty'],  
                        'weight' => 0, 

                        'options' => [
                            'image' => $cart['product_image'],
                            'user_id' => Auth::user()->id,
                            'p_code' => $cart['product_code'],
                            'description' => $cart['product_description'],
                            'size' => explode('-', $cart['product_size'])
                            ]
                     ]);
                }
            }
        }
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

        if(!Auth::check())
        {
            return redirect()->back()->with('flash_message_loginerror', 'Please login to add product in your Wishlist or Cart!');
        }
        
        $data = $request->all();

        if (!empty($request->cartbutton) && $request->cartbutton == "shopping cart") 
        {
            //check wheather item added or not
            $cartItem = CartItem::where(['product_id' => $data['id'],'product_size' => $data['size'],'user_id' => Auth::user()->id])->count();
            if ($cartItem > 0) {
                return redirect()->back()->with('flash_message_error', 'Item has already been added!');
            }

            Cart::instance('shopping')->add([
            'id' => $data['id'], 
            'name' => $data['name'], 
            'price' => $data['price'], 
            'qty' => $data['quantity'],  
            'weight' => 0, 

            'options' => [
                'image' => $data['img'],
                'user_id' => Auth::user()->id,
                'p_code' => $data['p_code'],
            	'description' => $data['description'],
                'size' => explode('-', $data['size'])
                ]
            ]);

            //store details to cart table
            CartItem::create([
                'product_id' => $data['id'],
                'user_id' => Auth::user()->id,
                'product_name' => $data['name'],
                'product_code' => $data['p_code'],
                'product_price' => $data['price'],
                'product_description' => $data['description'],
                'product_qty' => $data['quantity'],
                'product_size' => $data['size'],
                'product_image' => $data['img']
            ]);
        }  

        //wishlist
        if (!empty($request->wishlist) && $request->wishlist == "wishlist") 
        {
            Cart::instance('wishlist')->add([
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
            return redirect()->back()->with('flash_message_success', 'Added to Wishlist!');
        }

        return redirect()->back()->with('flash_message_success', 'Added to cart!');
    }

    public function show(Request $request)
    {
    	//
    }

    public function edit(Request $request,$id)
    {
        $qty = Cart::instance('shopping')->get($id)->qty;
        Cart::instance('shopping')->update($id,$qty-1);
        //update quantity
        $size = Cart::instance('shopping')->get($id)->options->size;
        CartItem::where(['product_id' => Cart::instance('shopping')->get($id)->id,'product_size' => $size[0].'-'.$size[1],'user_id' => Auth::user()->id])->update(['product_qty' => $qty-1]);

        return redirect()->back()->with('flash_message_success','Item quantity updated successfully!');
    }

    public function update(Request $request, $id)
    {
        $qty = Cart::instance('shopping')->get($id)->qty;
        Cart::instance('shopping')->update($id,$qty+1);
        //update quantity
        $size = Cart::instance('shopping')->get($id)->options->size;
        CartItem::where(['product_id' => Cart::instance('shopping')->get($id)->id,'product_size' => $size[0].'-'.$size[1],'user_id' => Auth::user()->id])->update(['product_qty' => $qty+1]);
        return redirect()->back()->with('flash_message_success','Item quantity updated successfully!');
    }

    public function destroy($id)
    {
        $product_id = Cart::instance('shopping')->get($id)->id;
        $size = Cart::instance('shopping')->get($id)->options->size;
        Cart::instance('shopping')->remove($id);
        CartItem::where(['product_id' => $product_id,'product_size' => $size[0].'-'.$size[1],'user_id' => Auth::user()->id])->delete();
        return redirect()->back()->with('delete_success', 'Item has been removed successfully!');
    }
}
