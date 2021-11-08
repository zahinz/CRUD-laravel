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

    public function download() {
        // dd('download');
        $fileName = 'all_users.csv';
        $users = User::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ID', 'Name', 'Username', 'Email', 'Role');

        $callback = function() use($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($users as $user) {
                $row['ID']  = $user->id;
                $row['Name']    = $user->name;
                $row['Username']    = $user->username;
                $row['Email']  = $user->email;
                if ($user->role == 1) {
                    $row['Role']  = 'Admin';
                } else {
                    $row['Role']  = 'Employee';
                }
                

                fputcsv($file, array($row['ID'], $row['Name'], $row['Username'], $row['Email'], $row['Role']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
