<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/','Site\\HomeController@welcome')->name('welcome');
Route::get('logout', 'Auth\\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/home','Site\\HomeController@index')->name('home');
	//product
	Route::get('/product', 'Site\\ProductController@displayProducts')->name('display.product');
	Route::get('/product/{id}', 'Site\\ProductController@productDetail')->name('product.detail');
	Route::get('/get-product-price', 'Site\\ProductController@getProductPrice')->name('product.price');
	//Apply-Coupon
	Route::post('/cart/apply-coupon', 'Site\\ProductController@applyCoupon')->name('coupon');
	//Account
	Route::match(array('GET', 'POST'), '/account', 'Site\\HomeController@account')->name('account');
	//checkout
	Route::match(array('GET', 'POST'), '/checkout', 'Site\\ProductController@checkout')->name('checkout');
	//Order-review
	Route::match(array('GET', 'POST'), '/order-review', 'Site\\ProductController@orderReview')->name('orderReview');
	//Place-order
	Route::match(array('GET', 'POST'), '/place-order', 'Site\\ProductController@placeOrder')->name('placeOrder');
	//when order has been placed
	Route::get('/thanks', 'Site\\ProductController@thanks')->name('thanks');
	//User orders list
	Route::get('/orders', 'Site\\ProductController@userOrders')->name('orders');
	//User order products list
	Route::get('/orders/{id}', 'Site\\ProductController@userOrderDetails');
	//check user password
	Route::get('/account/check-user-pwd', 'Site\\HomeController@checkPassword')->name('checkPwd');
	//Update user password
	Route::post('/account/update-user-pwd', 'Site\\HomeController@updatePassword')->name('updatePwd');
});
	//cart
	Route::resource('/cart', 'Site\\CartController');

	//check and add subscriber
	Route::post('/newsletter','Site\\NewsLetterController@store')->name('newsletter');
	// Route::post('/add-subscriber-email', 'Site\\NewsLetterController@addSubscriber')->name('addSubscriber');

//Admin
Route::group(['prefix'  =>  'admin'], function () {
	Route::group(['middleware' => ['auth','admin']], function () {
		//Configuration
		Route::get('/config', function () 
		{
			$admin = false;
		    return view('admin.configuration',['admin'=>$admin]);
		});

		//AdminPage
		Route::get('/',function(){
			return view('admin.adminpage');
		})->middleware(['auth','admin']);

		//ProductImage Route
		Route::get('/product-image/create/{product_id?}','Admin\\ProductImageController@create');
		Route::get('/product-image/{id?}/edit/{product_id?}','Admin\\ProductImageController@edit');

		//Display-Attribute Route
		Route::get('/product-attribute/create/{product_id?}','Admin\\ProductAttributeController@create');
		Route::get('/product-attribute/{id?}/edit/{product_id?}','Admin\\ProductAttributeController@edit');

		//Display-AttributeValue Route
		Route::get('/attribute-value/create/{attribute_id?}','Admin\\AttributeValueController@create');
		Route::get('/attribute-value/{id?}/edit/{attribute_id?}','Admin\\AttributeValueController@edit');

		//Edit status Newsletter Route
		// Route::get('/news-letter/{id?}/edit/{status?}', 'Admin\\NewsLetterController@edit');

		//User Route
		Route::resource('/user', 'Admin\\UserController');
		//Banner Route
		Route::resource('/banner', 'Admin\\BannerController');
		//Category Route
		Route::resource('/category', 'Admin\\CategoryController');
		//Product Route
		Route::resource('/product', 'Admin\\ProductController');
		//ProductImage Route
		Route::resource('/product-image', 'Admin\\ProductImageController');
		//Attribute Route
		Route::resource('/attribute', 'Admin\\AttributeController');
		//AttributeValue Route
		Route::resource('/attribute-value', 'Admin\\AttributeValueController');
		//ProductAttribute Route
		Route::resource('/product-attribute', 'Admin\\ProductAttributeController');
		//Coupon Route
		Route::resource('/coupon', 'Admin\\CouponController');
		//Order Route
		Route::resource('/order', 'Admin\\OrderController');
		//Newsletter Route
		// Route::resource('/news-letter', 'Admin\\NewsLetterController');

	});
});

