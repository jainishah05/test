<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Attribute;
use App\AttributeValue;
use Illuminate\Http\Request;

class AttributeController extends Controller
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
            $attribute = Attribute::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $attribute = Attribute::latest()->paginate($perPage);
        }

        return view('admin.attribute.index', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.attribute.create');
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
            'name' => 'required'
        ]);
        $requestData = $request->all();
        Attribute::create($requestData);

        return redirect('admin/attribute')->with('flash_message', 'Attribute added!');
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
        $attribute = Attribute::findOrFail($id);

        return view('admin.attribute.show', compact('attribute'));
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
        $attribute = Attribute::findOrFail($id);

        return view('admin.attribute.edit', compact('attribute'));
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
        
        $requestData = $request->all();
        $attribute = Attribute::findOrFail($id);
        $attribute->update($requestData);

        return redirect('admin/attribute')->with('flash_message', 'Attribute updated!');
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
        Attribute::destroy($id);

        return redirect('admin/attribute')->with('flash_message', 'Attribute deleted!');
    }

}
