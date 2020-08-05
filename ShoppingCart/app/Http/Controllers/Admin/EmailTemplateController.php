<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $emailtemplate = EmailTemplate::where('slug', 'LIKE', "%$keyword%")
                ->orWhere('subject', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $emailtemplate = EmailTemplate::latest()->paginate($perPage);
        }

        return view('admin.email-template.index', compact('emailtemplate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.email-template.create');
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
            'slug' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $requestData = $request->all();
        
        EmailTemplate::create($requestData);

        return redirect('admin/email-template')->with('flash_message', 'EmailTemplate added!');
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
        $emailtemplate = EmailTemplate::findOrFail($id);

        return view('admin.email-template.show', compact('emailtemplate'));
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
        $emailtemplate = EmailTemplate::findOrFail($id);

        return view('admin.email-template.edit', compact('emailtemplate'));
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
        
        $emailtemplate = EmailTemplate::findOrFail($id);
        $emailtemplate->update($requestData);

        return redirect('admin/email-template')->with('flash_message', 'EmailTemplate updated!');
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
        EmailTemplate::destroy($id);

        return redirect('admin/email-template')->with('flash_message', 'EmailTemplate deleted!');
    }
}
