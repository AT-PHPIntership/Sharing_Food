<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\FoodRepositoryEloquent;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\FoodsStoreRepositoryEloquent;
use Exception;
use Session;

class FoodStoreController extends Controller
{
    protected $userrepo;
    protected $foodrepo;
    protected $imagerepo;
    protected $typerepo;
    protected $commentrepo;
    protected $foodstorerepo;
    protected $placerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param FoodRepositoryEloquent       $food      the food repository
     * @param UserRepositoryEloquent       $user      the user repository
     * @param FoodsStoreRepositoryEloquent $foodstore the foodstore repository
     *
     * @return void
     */
    public function __construct(FoodRepositoryEloquent $food, UserRepositoryEloquent $user, FoodsStoreRepositoryEloquent $foodstore)
    {
        $this->userrepo = $user;
        $this->foodrepo = $food;
        $this->foodstorerepo = $foodstore;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodstores = $this->foodstorerepo->all();
        return view('backend.foodstores.index', compact('foodstores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.foodstores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\FoodStoreRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FoodStoreRequest $request)
    {
        $data = $request->all();
        $data['users_id'] = config('define.role_admin');
        try {
            $this->foodstorerepo->create($data);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_food_store.successful_message'));
            return redirect()->route('admin.foodstore.index');
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food_store.error_message'));
            return redirect()->route('admin.foodstore.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
