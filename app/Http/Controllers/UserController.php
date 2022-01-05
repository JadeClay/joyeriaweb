<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{   
    public function index(){
        $users = User::all(); // Retrieve all users and save it onto a variable
        return view('user.users-index')->with('users', $users);
    }

    public function create(){
        return view('user.users');
    }
}
