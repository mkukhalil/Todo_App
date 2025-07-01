<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('home', compact('users'));
    }

    public function create()
    {
        return view('adduser');
    }

   public function store(Request $request)
{
    $request->validate([
        'username' => 'required|regex:/^[a-zA-Z\s]+$/',
        'useremail' => 'required|email',
        'userage' => 'required|numeric',
        'usercity' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('users', $imageName, 'public'); // stores in storage/app/public/users
    }

    User::create([
        'name' => $request->username,
        'email' => $request->useremail,
        'age' => $request->userage,
        'city' => $request->usercity,
        'image' => $imageName, // this should NOT be null
    ]);

    return redirect()->route('user.index')->with('success', 'User added successfully!');
}


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('viewuser', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('updateuser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
    'username' => 'required|string|max:255',
    'useremail' => 'required|email',
    'userage' => 'required|integer',
    'usercity' => 'required|string|max:255',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048' // ✅ key line
]);


        $imageName = $user->image;

        if ($request->hasFile('image')) {
            if ($imageName && Storage::exists('public/users/' . $imageName)) {
                Storage::delete('public/users/' . $imageName);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('users', $imageName, 'public');
        }

        $user->update([
            'name' => $request->username,
            'email' => $request->useremail,
            'age' => $request->userage,
            'city' => $request->usercity,
            'image' => $imageName,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image && Storage::exists('public/users/' . $user->image)) {
            Storage::delete('public/users/' . $user->image);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}