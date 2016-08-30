<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use App\Http\Requests;
use App\Models\User;
use App\Repositories\Eloquent\UserRepositoryEloquent;

class GoogleController extends Controller
{
    protected $googlerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent $user the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->googlerepo = $user;
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
        $authUser= $this->googlerepo->where('email', '=', $googleUser->email);

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
        $user=$this->googlerepo->create([
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
