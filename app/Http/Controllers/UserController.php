<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view ('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=> ['required', 'string', 'max:100'],
            'avatar' => [File::types(['jpeg', 'jpg', 'png'])->max(2 * 1024),]
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        if($request->file('avatar')){
            if($user->avatar && Storage::exists($user->avatar)){
                Storage::delete($user->avatar);
            }
            $user->avatar = Storage::putFile('avatars', $request->file('avatar'));
        }
        $user->save();

        return redirect()->route('edit_profile');
    }
}
