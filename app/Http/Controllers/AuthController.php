<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\FoodRepositoryEloquent;
use App\Repositories\Eloquent\ImageRepositoryEloquent;

class AuthController extends Controller
{
    protected $repository;
    protected $foodrepo;
    protected $imagerepo;

    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent  $user  the user repository
     * @param FoodRepositoryEloquent  $food  the food repository
     * @param ImageRepositoryEloquent $image the image repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user, FoodRepositoryEloquent $food, ImageRepositoryEloquent $image)
    {
        // $this->middleware('guest');
        $this->repository = $user;
        $this->foodrepo = $food;
        $this->imagerepo = $image;
    }

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
        $foods = $this->foodrepo->with('images')->simplePaginate(6);
        foreach ($foods as $key => $value) {
            $foodList[]=$value;
            $image=$value['images']->first();
            $foodList[$key]['image']=$image['image'];
        }
        return view('frontend.foods.index', compact('foodList', 'foods'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $data=$request->all();
        if (!$data) {
            return response()->json([trans('auth.mes') => trans('auth.error_input_value')]);
        } else {
            $result=$this->repository->create([
                    'username' => $data['email'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['pass']),
                    'role_id' => trans('auth.role_id'),
                    'types_id' => trans('auth.types_id')
                ]);
            if (!empty($result)) {
                return response()->json([trans('auth.mes') => trans('auth.success_register'), trans('auth.allow') =>trans('auth.true')]);
            } else {
                return response()->json([trans('auth.mes') => trans('auth.error_register')]);
            }
        }
    }
}
