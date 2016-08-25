<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
                'email'=>'required|email',
                'password'=>'required'
            ]);

        if (!Auth::attempt($request->only(['email','password']), $request->has('remember'))) {
            return redirect()->back()->with(trans('auth.info'), trans('auth.error_login'));
        }
        if (Auth::user()->role_id==config('define.role_user')) {
            return redirect()->route('home');
        } else {
            return redirect()->route('admin');
        }
    }

    /**
     * Display view HomePage
     *
     * @return void
     */
    public function getHome()
    {
        return view('frontend.home');
    }

    /**
     * Display view AdminPage
     *
     * @return void
     */
    public function getAdmin()
    {
        return view('backend.layouts.master');
    }

    /**
     * Log out account
     *
     * @return void
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
