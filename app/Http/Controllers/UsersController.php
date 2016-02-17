<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    public function update(Requests\UserRequest $request)
    {
        $user = auth()->user();
        $oldAvatarName = $user->avatar;
        $avatarName = $user->id . '.' .
            $request->file('avatar')->getClientOriginalExtension();
        $user->avatar = $avatarName;
        $user->save();

        $uploadPath = base_path() . '/public/uploads/users/avatars/' . $user->id . '/';
        if ($oldAvatarName) {
            $oldAvatarFile = $uploadPath . $oldAvatarName;
            if (file_exists($oldAvatarFile)) {
                unlink(realpath($oldAvatarFile));
            }
        }

        $request->file('avatar')->move(
            $uploadPath,
            $avatarName
        );

        return redirect('/')
            ->with('flash_success', 'Avatar success updated.');
    }
}
