<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FoodEditRequest;
use App\Http\Controllers\Controller;

use App\Repositories\Eloquent\FoodRepositoryEloquent;
use App\Repositories\Eloquent\ImageRepositoryEloquent;
use App\Repositories\Eloquent\TypeRepositoryEloquent;
use App\Repositories\Eloquent\CommentRepositoryEloquent;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\PlaceRepositoryEloquent;
use App\Repositories\Eloquent\FoodsStoreRepositoryEloquent;
use Exception;
use Session;

class FoodController extends Controller
{
    protected $userrepo;
    protected $foodrepo;
    protected $imagerepo;
    protected $typerepo;
    protected $commentrepo;
    protected $foodstorerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param FoodRepositoryEloquent       $food      the food repository
     * @param ImageRepositoryEloquent      $image     the image repository
     * @param TypeRepositoryEloquent       $type      the type repository
     * @param CommentRepositoryEloquent    $comment   the comment repository
     * @param UserRepositoryEloquent       $user      the user repository
     * @param FoodsStoreRepositoryEloquent $foodstore the user repository
     *
     * @return void
     */
    public function __construct(FoodRepositoryEloquent $food, ImageRepositoryEloquent $image, TypeRepositoryEloquent $type, CommentRepositoryEloquent $comment, UserRepositoryEloquent $user, FoodsStoreRepositoryEloquent $foodstore)
    {
        $this->userrepo = $user;
        $this->foodrepo = $food;
        $this->imagerepo = $image;
        $this->typerepo = $type;
        $this->commentrepo = $comment;
        $this->foodstorerepo = $foodstore;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods= $this->foodrepo->all();
        return view('backend.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $list = $this->foodrepo->find($id);
            return view('backend.foods.edit', compact('list'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect()->route('admin.food.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(FoodEditRequest $request, $id)
    {
        $data = $request->all();
        $list = $this->foodrepo->find($id);
        if (empty($list)) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.danger_edit'));
        } else {
            $this->foodrepo->update($data, $id);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('lang_admin_manager_user.edit_success'));
        }
        return redirect() -> route('admin.food.index');
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
            $count = $this->foodrepo->find($id);
            if (!empty($count)) {
                $imageItem=$this->imagerepo->findByField('foods_id', $id, ['id']);
                for ($i=0; $i<count($imageItem); $i++) {
                    $result1=$this->imagerepo->delete($imageItem[$i]['id']);
                }
                if ($result1) {
                    $result = $this->foodrepo->delete($id);
                    if ($result) {
                        Session::flash(trans('lang_admin_manager_user.success_cf'), trans('lang_admin_manager_user.delete_success'));
                    } else {
                        Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
                    }
                } else {
                    Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
                }
            } else {
                Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
            }
            return redirect() -> route('admin.food.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect() -> route('admin.food.index');
        }
    }
}
