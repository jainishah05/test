<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Attribute;
use App\AttributeValue;
use App\ProductAttribute;
use App\Product;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id = null)
    {
        $attribute = Attribute::all();
        $attributevalue = AttributeValue::all();
        $product = Product::all();
        return view('admin.product-attribute.create', compact('attribute','attributevalue','product','product_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr_id = $request->attribute_id;
        $requestData = $request->all();
        $requestData['attribute_value'] = $request[$attr_id];
        ProductAttribute::create($requestData);

        return redirect('admin/product/'.$request->product_id.'/edit')->with('flash_message', 'ProductAttribute added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$product_id = null)
    {
        $productAttr = ProductAttribute::findOrFail($id);
        $attribute = Attribute::all();
        $attributevalue = AttributeValue::all();
        $product = Product::all();
        return view('admin.product-attribute.edit', compact('attribute','attributevalue','product','product_id','productAttr'));
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
        $attr_id = $request->attribute_id;
        $requestData = $request->all();
        $requestData['attribute_value'] = $request[$attr_id];
        
        $productAttr = ProductAttribute::findOrFail($id);
        $productAttr->update($requestData);

        return redirect('admin/product/'.$request->product_id.'/edit')->with('flash_message', 'ProductAttribute updated or New ProductAttribute Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producAttr = ProductAttribute::findOrFail($id);
        // $product_id = $producAttr->product_id;
        dd(ProductAttribute::destroy($id));

        return redirect('admin/product/'.$product_id.'/edit')->with('flash_message', 'ProductAttribute deleted!');
    }
}
