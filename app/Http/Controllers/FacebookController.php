<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use Socialite;
use App\User;

class FacebookController extends Controller
{
    /**
     * Construct a FacebookController
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Display get User
     *
     * @return void
     */
    public function getSocialAuth()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Display return User
     *
     * @return void
     */
    public function getSocialAuthCallback()
    {

        try {
            $user= Socialite::driver('facebook')->user();
        } catch (Exception $e) {
        }
        $authUser= $this->findOrCreateUser($user);
        Auth::login($authUser);
        return redirect()->route('home');
    }
    /**
     * Display find User
     *
     * @param Laravel\Socialite\SocialiteServiceProvider $facebookUser facebookUser
     *
     * @return void
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser= User::where('email', '=', $facebookUser->user['email'])->first();
        if ($authUser) {
            return $authUser;
        }
        return $this->createUser($facebookUser);
    }
    /**
     * Display create User
     *
     * @param Laravel\Socialite\SocialiteServiceProvider $user user
     *
     * @return void
     */
    private function createUser($user)
    {
        $user=User::create([
                'username'=>$user->name,
                'email'=>$user->email,
                'avatar'=>$user->avatar,
                'password' => bcrypt(trans('auth.pass')),
                'role_id' => trans('auth.role_user'),
                'types_id' => trans('auth.role_admin'),
            ]);
        return $user;
    }
}
