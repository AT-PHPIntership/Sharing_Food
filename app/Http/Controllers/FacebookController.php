<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use Socialite;
use App\Models\User;
use App\Repositories\Eloquent\UserRepositoryEloquent;

class FacebookController extends Controller
{
    protected $facerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent $user the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->facerepo = $user;
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
        $authUser= $this->facerepo->where('email', '=', $facebookUser->user['email']);
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
        $user=$this->facerepo->create([
                'username'=>$user->name,
                'email'=>$user->email,
                'avatar'=>$user->avatar,
                'password' => bcrypt(trans('auth.pass')),
                'role_id' => trans('auth.role_id'),
                'types_id' => trans('auth.types_id'),
            ]);
        return $user;
    }
}
