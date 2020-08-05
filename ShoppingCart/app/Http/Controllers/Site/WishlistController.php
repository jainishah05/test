<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\CartItem;
use App\Category;
use Auth;
use View;

class WishlistController extends Controller
{
    public function __construct()
    {
        // Sharing categories object to all views
        $categories = Category::all();
        View::share('categories', $categories);
    }
    
    public function wishlist()
    {
        $wishlistCollection = Cart::instance('wishlist')->content();
        return view('site.cart.wishlist')->with(['wishlistCollection' => $wishlistCollection]);
    }

    public function wishlistToCart(Request $request)
    {
        $data = $request->all();

        //check wheather item added or not
        $cartItem = CartItem::where(['product_id' => $data['id'],'product_size' => $data['id'].'-'.$data['size']])->count();
        if ($cartItem > 0) {
            return redirect()->back()->with('flash_message_error', 'Item has already been added!');
        }

        $size = $data['id'].'-'.$data['size'];
        $sizearr = explode('-', $size);
        //Wishlist items to cart
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
            'size' => $sizearr
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
            'product_size' => $size,
            'product_image' => $data['img']
        ]);

        Cart::instance('wishlist')->remove($data['rowId']);

        return redirect()->back()->with('flash_message_success','Wishlist item added to cart successfully!');
    }

    public function destroy($id)
    {
    	Cart::instance('wishlist')->remove($id);
        return redirect()->back()->with('delete_success', 'Item has been removed successfully!');
    }
}
