<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index', [
            'users' => User::latest()->get()
        ]);
    }

    public function toggle(User $user)
    {
        $user->update([
            'is_admin' => !$user->is_admin
        ]);

        return back()->with('success', 'Role updated!');
    }
}
