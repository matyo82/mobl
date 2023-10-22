<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(8);
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
            'user_type' => 'required|boolean',
            'image' => 'nullable|image|max:5120'
        ]);
        $validated['password'] = bcrypt($validated['password']);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/users'), $fileName);
            $validated['image'] = 'images/users/' . '' . $fileName;
        }

        if (User::create($validated)) {
            session()->flash('success', 'کاربر با موفقیت ایجاد شد');
        } else {
            session()->flash('failed', 'ایجاد کاربر با خطا مواجه شد');
        }
        return redirect()->route('admin.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->email, 'email')
            ],
            'password' => 'nullable|min:8',
            'confirm_password' => 'nullable|min:8|same:password',
            'user_type' => 'required|boolean',
            'image' => 'nullable|image|max:5120'
        ]);
        $validated['password'] = bcrypt($validated['password']);

        if ($request->hasFile('image')) {
            if (File::exists($user->image))
                File::delete($user->image);

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/users'), $fileName);
            $validated['image'] = 'images/users/' . '' . $fileName;
        }

        if ($user->update($validated)) {
            session()->flash('success', 'کاربر با موفقیت ویرایش شد');
        } else {
            session()->flash('failed', 'ویرایش کاربر با خطا مواجه شد');
        }
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function setAdmin(User $user)
    {
        $user->user_type = 1;
        $user->save();

        session()->flash('success', 'کاربر مورد نظر به مدیر ترفیع یافت!');
        return redirect()->back();
    }

    public function unsetAdmin(User $user)
    {
        $user->user_type = 0;
        $user->save();

        session()->flash('success', 'کاربر مورد نظر از مدیریت عزل شد!');
        return redirect()->back();
    }
}
