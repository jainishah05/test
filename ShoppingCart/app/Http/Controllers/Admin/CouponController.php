<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
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
            $coupon = Coupon::where('coupon_code', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('amount_type', 'LIKE', "%$keyword%")
                ->orWhere('expiry_date', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $coupon = Coupon::latest()->paginate($perPage);
        }

        return view('admin.coupon.index', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.coupon.create');
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
            'coupon_code' => 'required',
            'amount' => 'required',
            'expiry_date' => 'required',
            'amount_type' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();
        
        Coupon::create($requestData);

        return redirect('admin/coupon')->with('flash_message', 'Coupon added!');
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
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupon.show', compact('coupon'));
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
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupon.edit', compact('coupon'));
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
        
        $coupon = Coupon::findOrFail($id);
        $coupon->update($requestData);

        return redirect('admin/coupon')->with('flash_message', 'Coupon updated!');
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
        Coupon::destroy($id);

        return redirect('admin/coupon')->with('flash_message', 'Coupon deleted!');
    }
}
