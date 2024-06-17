<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  //Seeker function
    const JOB_SEEKER = 'seeker';
    const  JOB_POSTER = 'employer';

    public function createSeeker(){

        return view('user.seeker-register');
    }
 
    //Store Seeker function
    public function storeSeeker(RegistrationFormRequest $request){
        User::create([
            'name'=> request('name'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER,
        ]);

        return redirect() -> route('login')->with('successMessage', 'Your Job Seeker Account was created successfully');;
    }
    
     //Employer function
      public function createEmployer(){

        return view('user.employer-register');
    }
 
    //Store Employer function
    public function storeEmployer(RegistrationFormRequest $request){
        User::create([
            'name'=> request('name'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password')),
            'user_type' => self::JOB_POSTER,
            'user_trial' => now()->addWeek()
        ]); 

        return redirect() -> route('login')->with('successMessage', 'Your Employer Account was created successfully');
    }

    //Login function
    public function login(){

       return view('user.login');
    }

    public function postLogin(Request $request){
       
      $request-> validate([
          'email' => 'required',
          'password'=> 'required',
        ]
      );

      $credentials =  $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }

        return 'Wrong email or password';
    }
 

     //logout function
    public function logout(){

        auth()->logout();
        return redirect()-> route('login');
    }

}
