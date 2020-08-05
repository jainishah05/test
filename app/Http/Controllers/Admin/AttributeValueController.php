<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AttributeValue;
use App\Attribute;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
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
    public function create($attribute_id = null)
    {
        $attributevalue = AttributeValue::all();
        return view('admin.attribute-value.create', compact('attributevalue','attribute_id'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        AttributeValue::create($requestData);

        return redirect('admin/attribute-value/create/'.$request->attribute_id)->with('flash_message', 'Attribute-Value added!');
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
    public function edit($id,$attribute_id = null)
    {
        $attributevalue = AttributeValue::findOrFail($id);
        $attributeval = AttributeValue::all();
        return view('admin.attribute-value.edit', compact('attributevalue','attributeval','attribute_id'));
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
        $requestData = $request->all();
        $attributevalue = AttributeValue::findOrFail($id);
        $attributevalue->update($requestData);

        return redirect('admin/attribute-value/create/'.$request->attribute_id)->with('flash_message', 'Attribute updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        AttributeValue::destroy($id);
        return redirect('admin/attribute-value/create/'.$request->attribute_id)->with('flash_message', 'Attribute deleted!');
    }
}
