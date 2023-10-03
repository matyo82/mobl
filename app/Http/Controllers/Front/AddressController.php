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
    public function store(StoreAddressRequest $request)
    {
        //
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
    public function update(UpdateAddressRequest $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
	
	
	public function addAddress(AddressRequest $request)
	{
		$inputs=$request->all();
		$inputs['user_id']=auth()->user()->id;
		$address=Address::create($inputs);
		return back();
	}
	
	
	public function updateAddress(Address $address,AddressRequest $request)
	{
		$inputs=$request->all();
		$inputs['user_id']=auth()->user()->id;
		$address->update($inputs);
		return back();
	}
}
