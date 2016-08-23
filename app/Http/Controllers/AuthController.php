<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
    /**
     * Display view Login
     *
     * @return void
     */
    public function getLogin()
    {
        return view('login');
    }
}
