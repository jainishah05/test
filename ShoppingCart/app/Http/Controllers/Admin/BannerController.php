<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Banner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = config('constants.page');

        if (!empty($keyword)) {
            $banner = Banner::where('title', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $banner = Banner::latest()->paginate($perPage);
        }
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'link' => 'required',
            'image' => 'required',
			'status' => 'required'
		]);
        $banners = new Banner();
        $banners->title = $request->title;
        $banners->link = $request->link;
        $banners->image = $request->image;
        $banners->status = $request->status;

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move('uploads/banners/',$imagename);
            $banners->image = $imagename;
        }else{
            return $request;
            $banners->image = '';
        }

        $banners->save();
        return redirect('admin/banner')->with('flash_message', 'Banner added!');
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
        $banner = Banner::findOrFail($id);

        return view('admin.banner.show', compact('banner'));
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
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
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
			'link' => 'required'
		]);

        $banners = Banner::findOrFail($id);

        $banners->title = $request->title;
        $banners->link = $request->link;
        $banners->status = $request->status;

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move('uploads/banners/',$imagename);
            $banners->image = $imagename;
        }
        $banners->update();

        // $requestData = $request->all();
        // if ($request->hasFile('image')) {
        //     $requestData['image'] = $request->file('image')
        //         ->store('uploads', 'public');
        // }

        // $banner->update($requestData);

        return redirect('admin/banner')->with('flash_message', 'Banner updated!');
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
        Banner::destroy($id);

        return redirect('admin/banner')->with('flash_message', 'Banner deleted!');
    }
}
