<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use App\Http\Requests;
use App\User;

class GoogleController extends Controller
{
    /**
     * Construct a GoogleController
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
    public function getSocial()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Display return User
     *
     * @return void
     */
    public function getSocialCallback()
    {

        try {
            $user=Socialite::driver('google')->user();
        } catch (Exception $e) {
        }
        $authUser= $this->findOrCreateUser($user);
        Auth::login($authUser);
        return redirect()->route('home');
    }
    /**
     * Display find User
     *
     * @param Laravel\Socialite\SocialiteServiceProvider $googleUser googleUser
     *
     * @return void
     */
    private function findOrCreateUser($googleUser)
    {
        $authUser= User::where('email', '=', $googleUser->email)->first();

        if ($authUser) {
            return $authUser;
        }
        return $this->createUser($googleUser);
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
