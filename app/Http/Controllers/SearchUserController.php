<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// class SearchUserController extends Controller
// {
//     public function index( Request $request) {
//         $input = $request->input('query');
//         dd($input);

//         $users = User::where([
//             ['name', !=, Null],
//             [function ($query) use ($input){
//                 if (($term = $input -> $term)){
//                     $query->orWhere('name', 'LIKE', '%'.term.'%')->get()
//                 }
//             }]
//         ])
//             -> ordery('id', 'desc')
//             -> paginate(10);
        
//         return view('') 
//     }
// }
