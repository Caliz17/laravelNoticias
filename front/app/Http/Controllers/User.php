<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class User extends Controller
{
    public function getLogin()
    {
        return view('login');
    }
}
