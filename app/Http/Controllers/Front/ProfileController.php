<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
		
        return view('front.profile');
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:120|min:2',
            'last_name' => 'required|max:120|min:2',
            //'email' => ['sometimes','string','email',Rule::unique('users')->ignore(auth()->user()->email), 'email'],
        ]);
        $inputs = $request->all();
        $user = auth()->user();
        $user->update($inputs);
        return redirect()->back();
    }
}
