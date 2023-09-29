<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\ProductCategory;
use App\Models\Fabric;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	    $categories=ProductCategory::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $inputs = $request->all();
		//dd($inputs);
				
		if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $fileName);
            $inputs['image'] = 'images/products/' . '' . $fileName;
        }
        $product = Product::create($inputs);
		/////////////////////////////////////////////
        $metas = array_combine($request->meta_key, $request->meta_value);
        foreach($metas as $key => $value){
            $meta = ProductMeta::create([
                'meta_key' => $key,
                'meta_value' => $value,
                'product_id' => $product->id
            ]);
        }
		////////////////////////////////////////////////////////////////////

        return redirect()->route('admin.product.index')->with('create-success','عملیات موفقیت امیز بود');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
		$categories=ProductCategory::all();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
         $inputs = $request->all();
		 //dd($inputs);
		if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $fileName);
            $inputs['image'] = 'images/products/' . '' . $fileName;
        }
		$product->update($inputs);
		
		if($request->meta_key and $request->meta_value !== null){
		ProductMeta::where('product_id',$product->id)->forceDelete();
		}
		
		$metas = array_combine($request->meta_key, $request->meta_value);
        foreach($metas as $key => $value){
            $meta = ProductMeta::create([
                'meta_key' => $key,
                'meta_value' => $value,
                'product_id' => $product->id
            ]);
		 }

        return redirect()->route('admin.product.index');
	
		
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
		return redirect()->route('admin.product.index')->with('create-success','عملیات موفقیت امیز بود');

    }
}
