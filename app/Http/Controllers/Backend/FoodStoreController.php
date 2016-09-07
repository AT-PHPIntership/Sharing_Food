<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodStoreEditRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\FoodRepositoryEloquent;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\FoodsStoreRepositoryEloquent;
use Exception;
use Session;
use Auth;

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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $list = $this->foodstorerepo->find($id);
            return view('backend.foodstores.show', compact('list'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect()->route('admin.foodstore.show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $list = $this->foodstorerepo->find($id);
            return view('backend.foodstores.edit', compact('list'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect()->route('admin.foodstore.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\FoodStoreEditRequest $request request
     * @param int                                   $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(FoodStoreEditRequest $request, $id)
    {
        $data = $request->all();
        $data['users_id']=Auth::user()->id;
        $list = $this->foodstorerepo->find($id);
        if (empty($list)) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food_store.danger_edit'));
        } else {
            $this->foodstorerepo->update($data, $id);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_food_store.edit_success'));
        }
        return redirect() -> route('admin.foodstore.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $count = $this->foodstorerepo->find($id);
            if (!empty($count)) {
                $findfood= $this->foodrepo->findByField('food_store_id', $id);
                if (count($findfood)!=0) {
                    Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food_store.delete_food'));
                } else {
                    $result = $this->foodstorerepo->delete($id);
                    if ($result) {
                        Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_food.delete_success'));
                    } else {
                        Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food.delete_fail'));
                    }
                }
            } else {
                Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food_store.delete_fail'));
            }
            return redirect() -> route('admin.foodstore.index');
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect() -> route('admin.foodstore.index');
        }
    }
}
