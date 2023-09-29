<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

                'name' => 'required|max:120|min:2',
                'introduction' => 'required|max:10000|min:5',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'marketable_number' => 'required|min:1',
                'guarantee' => 'required|numeric|in:0,1',
                'category_id' => 'required|min:1|max:100000000,|exists:product_categories,id',
				'meta_key.*'=>'required|max:120|min:1',
				'meta_value.*'=>'required|max:120|min:1',
				'selected_fabrics'=>'required|array',
        ];
	
    }
}
