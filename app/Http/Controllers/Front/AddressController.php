<?php

namespace App\Http\Controllers\Front;

use App\Models\Address;
use App\Http\Requests\AddressRequest;
use App\Http\Controllers\Controller;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
	{
		$inputs=$request->all();
		$inputs['user_id']=auth()->user()->id;
		$address=Address::create($inputs);

        if ($address->update($inputs)) {
            session()->flash('success', 'آدرس با موفقیت ایجاد شد');
        } else {
            session()->flash('failed', 'ایجاد آدرس با خطا مواجه شد');
        }
		return back();
	}

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Address $address,AddressRequest $request)
	{
		$inputs=$request->all();
		$inputs['user_id']=auth()->user()->id;

        if ($address->update($inputs)) {
            session()->flash('success', 'آدرس با موفقیت ویرایش شد');
        } else {
            session()->flash('failed', 'ویرایش آدرس با خطا مواجه شد');
        }
		return back();
	}

    /**
     * Remove the specified resource from storage.
     */
    public function deleteAddress(Address $address)
    {
        $address->delete();
        return back();
    }
}
