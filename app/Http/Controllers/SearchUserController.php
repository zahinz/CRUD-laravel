<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchUserController extends Controller
{
    public function index( Request $request) {
        $input = $request->input('query');
        dd($input);
        
    }
}
