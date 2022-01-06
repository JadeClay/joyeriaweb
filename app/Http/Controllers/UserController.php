<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{   
    public function index(){
        $users = User::simplePaginate(10); // Retrieve all users, using pagination method.
        return view('user.users-index')->with('users', $users);
    }

    public function create(){
        return view('user.users');
    }
}
