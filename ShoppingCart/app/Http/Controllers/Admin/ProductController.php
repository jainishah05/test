<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Product;
use App\Category;
use App\ProductImage;
use App\Attribute;
use App\ProductAttribute;
use App\AttributeValue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = config('constants.page');
    
        if (!empty($keyword)) {
            $product = Product::where('name', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'color' => 'required',
            'product_code' => 'required',
            'color' => 'required',
            'description' => 'required',
            'price' => 'required'
		]);
        $requestData = $request->all();
        $data = Product::create($requestData);
        $product = Product::find($data->id);
        $product->categories()->attach($request->category_id);

        return redirect('admin/product')->with('flash_message', 'Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.show', compact('product','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $productImg = ProductImage::where('product_id',$id)->first();
        $productAttr = ProductAttribute::where('product_id',$id)->first();
        $categories = Category::all();
        return view('admin.product.edit', compact('product','categories','productImg','productAttr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
		]);
        $requestData = $request->all();
        $product = Product::findOrFail($id);
        $product->update($requestData);
        if ($request->has('category_id'))
        {
            $product->categories()->sync($request['category_id']);
        }
        return redirect('admin/product')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('admin/product')->with('flash_message', 'Product deleted!');
    }
}
