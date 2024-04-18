<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // [ 'name' => 'hossein' , 'role'=> 'applicant' , 'isActive' => true ]
    // [ 'name' => 'hossein-admin' , 'role'=> 'admin' , 'isActive' => true ]
    // [ 'name' => 'hossein-employer' , 'role'=> 'employer' , 'isActive' => true ]
    public function show()
    {
        return request()->user()->data();
    }
}
