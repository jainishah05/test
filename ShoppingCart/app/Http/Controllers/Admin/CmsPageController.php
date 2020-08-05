<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CmsPage;
use Illuminate\Http\Request;

class CmsPageController extends Controller
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
            $cmspage = CmsPage::where('title', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cmspage = CmsPage::latest()->paginate($perPage);
        }

        return view('admin.cms-page.index', compact('cmspage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cms-page.create');
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
            'title' => 'required',
            'url' => 'required',
            'description' => 'required|email:rfc,dns',
            'status' => 'required'
        ]);
        $requestData = $request->all();
        
        CmsPage::create($requestData);

        return redirect('admin/cms-page')->with('flash_message', 'CmsPage added!');
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
        $cmspage = CmsPage::findOrFail($id);

        return view('admin.cms-page.show', compact('cmspage'));
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
        $cmspage = CmsPage::findOrFail($id);

        return view('admin.cms-page.edit', compact('cmspage'));
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
        
        $cmspage = CmsPage::findOrFail($id);
        $cmspage->update($requestData);

        return redirect('admin/cms-page')->with('flash_message', 'CmsPage updated!');
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
        CmsPage::destroy($id);

        return redirect('admin/cms-page')->with('flash_message', 'CmsPage deleted!');
    }
}
