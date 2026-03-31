<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\User;


class AuthController extends Controller
{
    //
     public function loginPage () {
        return view('auth.login');
    }

    public function registerPage () {
        return view('auth.register');
    }
     public function logout () {
        \Auth::logout();
      return redirect('/login');

    }

    public function login (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/home');
        
        } else {
            return redirect()->back()->withErrors(
                ['password' => 'Username or password is incorrect']
            );
        }
        // return view('auth.test');
    }

    public function register (Request $request) {
        
        $request->validate([
            'firstname' => 'required|min:3|max:10',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);


        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->name = $request->firstname . ' ' . $request->lastname;
        $user->email = $request->email;
        $user->profile_photo = '/assets/images/image.png';
        $user->password = \Hash::make($request->password);
        $user->save();
            return redirect('/login');
        
        
    }
    public function profilepage (Request $request) {
        $user=\Auth::user();
        $user->name=$request->name;
        if($request->hasFile('profile_photo')){
            $path =$request->file('profile_photo')->store('public/image');
            $user->profile_photo= \Str::replace('public', '/storage', $path);
        }
        $user->save();



        return redirect()->back();
    }
}
