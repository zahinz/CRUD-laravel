<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AllUserDashboardController extends Controller
{
    public function index() {
        // dd('all users');
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        // dd($users);
        return view('dashboard.user', [
            'users' => $users
        ]);
    }

    public function createNewUser(Request $request) {
        // validate the input
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'role' => 'required|min:1|max:2',
        ]);
        // dd($request);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('createNewUser')->with('newUserSuccess', 'New user created.');
    }
}
