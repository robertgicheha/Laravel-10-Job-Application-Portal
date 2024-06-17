<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    const JOB_SEEKER = 'seeker';

    public function createSeeker(){

        return view('user.seeker-register');
    }

    public function storeSeeker(){
        User::create([
            'name'=> request('name'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER,
        ]);

        return back();
    }
}
