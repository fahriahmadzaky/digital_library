<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){

        if($request->isMethod('get')){
            return view('auth.login');
        }else{
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);
    
            $user = User::where('username', $request->input('username'))->first();
    
            if (!$user) {
                return redirect('/login')->with('message', 'Username or password incorrect');
            }
        
            if (!Hash::check($request->input('password'), $user->password)) {
                return redirect('/login')->with('message', 'Username or password incorrect');
            }
    
            $request->session()->put('role', $user->role);
            $request->session()->put('fullname', $user->fullname);
            $request->session()->put('idUser', $user->id);

            if ($user->role == 'administrator') {
                return redirect('admin/dashboard')->with('message', 'Welcome, ' . $user->fullname );
            } elseif ($user->role == 'staff') {
                return redirect('staff/dashboard')->with('message', 'Welcome, ' . $user->fullname );
            } else {
                return redirect('member/dashboard')->with('message', 'Welcome, ' . $user->fullname );
            }
        }
    }

    public function register (Request $request){

        if($request->isMethod('get')){
            return view('auth.register');
        }else{
            $request->validate([
                'fullname' => 'required|string|min:3|max:255',
                'email' => 'required|string|min:3|max:255|email',
                'username' => 'required|string|min:3|unique:users,username',
                'password' => 'required|string|min:6',
                'address' => 'required|string|min:3|max:255'
            ]);
    
            $user = User::create([
                'fullname' => $request->input('fullname'),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'address' => $request->input('address')
            ]);
    
            return redirect('/login')->with('message', 'Account created successfully. Please log in' );      
        }
    }

    public function logout(Request $request){
        $request->session()->forget('role');
        $request->session()->forget('username');
        $request->session()->forget('id');
        return redirect('/login');
    }
}
