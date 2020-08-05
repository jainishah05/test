<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ProductImage;
use App\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
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
        $product = Product::all();

        if (!empty($keyword)) {
            $productimage = ProductImage::where('product_id', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $productimage = ProductImage::latest()->paginate($perPage);
        }

        return view('admin.product-image.index', compact('productimage','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($product_id = null)
    {
        $product = Product::all();
        return view('admin.product-image.create', compact('product','product_id'));
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
        $productimage = new ProductImage();
        $productimage->product_id = $request->product_id;
        // $productimage->image = $request->image;

        if ($request->hasFile('image')) 
        {
            foreach($request->image as $img)
            {
                $extension = $img->getClientOriginalExtension();
                $imagename = rand(1, 9999).'.'.$extension;
                $img->move('uploads/productimages/',$imagename);
            }
        }
        $productimage->image = $imagename;
        $productimage->save();
        return redirect('admin/product/'.$request->product_id.'/edit')->with('flash_message', 'ProductImage added!');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id,$product_id = null)
    {
        $productimage = ProductImage::findOrFail($id);
        $multipleimg = ProductImage::where('product_id','=',$product_id)->get();
        $product = Product::all();

        return view('admin.product-image.edit', compact('productimage','product','multipleimg','product_id'));
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
        
        $productimg = new ProductImage();
        $productimg->product_id = $request->product_id;
        if ($request->hasFile('image')) 
        {
            foreach($request->image as $img)
            {
                $extension = $img->getClientOriginalExtension();
                $imagename = rand(1, 9999).'.'.$extension;
                $img->move('uploads/productimages/',$imagename);
            }
        }
        $productimg->image = $imagename;
        $productimg->save();

        return redirect('admin/product/'.$request->product_id.'/edit')->with('flash_message','New ProductImage added!');
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
        $productimg = ProductImage::findOrFail($id);
        $product_id = $productimg->product_id;
        ProductImage::destroy($id);

        return redirect('admin/product/'.$product_id.'/edit')->with('flash_message', 'ProductImage deleted!');
    }
}
