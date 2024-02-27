<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //

    function index () 
    {
        $data = [
            'user' =>  User::find(session('idUser'))
        ];
        
        return view('profile.index', $data);
    }

    function update(Request $request)
    {
        $user = User::find(session('idUser'));

        if($request->isMethod('get')){
            $data = [
                'user' =>  User::find(session('idUser'))
            ];
            return view('profile.update', $data);
        }else{
            $request->validate([
                'fullname' => 'required|string|min:3|max:255',
                'email' => 'required|string|min:3|max:255|email',
                'username' => [
                    'required',
                    'string',
                    'min:3',
                    Rule::unique('users')->ignore($user->id),
                ],
                'address' => 'required|string|min:3|max:255'
            ]);

            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->address = $request->address;
            $user->save();

            return redirect('/profile/update')->with(['message' => 'Account updated successfully']);
        }
    }

    function updatePassword(Request $request)
    {
        $user = User::find(session('idUser'));

        if ($request->isMethod('get')) {
            return view('profile.password');
        } else {
            // $request->validate([
            //     'password' => 'required|string|min:6',
            // ]);

            if (Hash::check($request->old_password, $user->password)) {
                $user->password = bcrypt($request->new_password);
                $user->save();
                return redirect('/profile/password/update')->with('success', 'Password updated successfully');
            }
            return redirect('/profile/password/update')->with('error', 'Password does not match');
        }
    }
}
