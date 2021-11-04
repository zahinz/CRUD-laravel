<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {

        // observe the sign in status
        // dd(auth()->user()->name);
        // ? created at will return created_at as carbon datetime manipulation. Carbon is a php package. https://carbon.nesbot.com/docs/
        // dd(Post::find(4)->created_at->diffForHumans());
        $user = Auth::user();
        return view('auth.dashboard', ['user'=>$user]);
    }
}