<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
    public function index() {
        // dd(request()->segment(count(request()->segments())));
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        // dd($users);
        return view('dashboard.edituser', [
            'users' => $users
        ]);
    }

    public function update(Request $request, User $user) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|min:1|max:2',
        ]);
        
        try{
            //Find the user object from model if it exists
            // $database= User::findOrFail($user);
            // dd($user);
    
            //$request contain your post data sent from your edit from
            //$user is an object which contains the column names of your table
    
            //Set user object attributes
            $user->name = $request['name'];
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->role = $request['role'];
    
            // Save/update user. 
            // This will will update your the row in ur db.
            $user->save();
    
            return redirect()->route('allusers')->with('updateUserSuccess', 'User information updated!');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }


    }
    public function destroy(User $user) {
        $user->delete();
        return back();
    }
}
