<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
	  if($this->isMethod('post')){
        return [
            'province' => 'required',
            'city' => 'required',
            'address' => 'required|min:1|max:300',
            'postal_code' => 'required',
            'no' => 'required',
            'unit' => 'required',
			'status' => 'required|numeric|in:0,1',
        ];
	  }else{
		return [
            'province' => 'required',
            'city' => 'required',
            'address' => 'required|min:1|max:300',
            'postal_code' => 'required',
            'no' => 'required',
            'unit' => 'required',
			'status' => 'required|numeric|in:0,1',

        ];
	  }
    }
}
