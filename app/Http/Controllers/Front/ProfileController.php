<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('front.profile', compact('user'));
    }


    public function update(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'name' => 'required|max:120|min:2',
            'last_name' => 'required|max:120|min:2',
            'image' => 'nullable|image|max:5120'
            //'email' => ['sometimes','string','email',Rule::unique('users')->ignore(auth()->user()->email), 'email'],
        ]);

        if ($request->hasFile('image')) {
            if (File::exists($user->image))
                File::delete($user->image);

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/users'), $fileName);
            $validated['image'] = 'images/users/' . '' . $fileName;
        }

        if ($user->update($validated)) {
            session()->flash('success', 'پروفایل شما با موفقیت ویرایش شد');
        } else {
            session()->flash('failed', 'ویرایش پروفایل شما با خطا مواجه شد');
        }

        return redirect()->back();
    }
}
