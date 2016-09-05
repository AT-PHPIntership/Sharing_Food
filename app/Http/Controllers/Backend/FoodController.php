<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FoodEditRequest;
use App\Http\Requests\FoodCreateRequest;
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
    protected $placerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param FoodRepositoryEloquent       $food      the food repository
     * @param ImageRepositoryEloquent      $image     the image repository
     * @param TypeRepositoryEloquent       $type      the type repository
     * @param CommentRepositoryEloquent    $comment   the comment repository
     * @param UserRepositoryEloquent       $user      the user repository
     * @param FoodsStoreRepositoryEloquent $foodstore the foodstore repository
     * @param PlaceRepositoryEloquent      $place     the place repository
     *
     * @return void
     */
    public function __construct(FoodRepositoryEloquent $food, ImageRepositoryEloquent $image, TypeRepositoryEloquent $type, CommentRepositoryEloquent $comment, UserRepositoryEloquent $user, FoodsStoreRepositoryEloquent $foodstore, PlaceRepositoryEloquent $place)
    {
        $this->userrepo = $user;
        $this->foodrepo = $food;
        $this->imagerepo = $image;
        $this->typerepo = $type;
        $this->commentrepo = $comment;
        $this->foodstorerepo = $foodstore;
        $this->placerepo = $place;
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
        $types= $this->typerepo->lists('type', 'id');
        $foodstores = $this->foodstorerepo->lists('name', 'id');
        return view('backend.foods.create', compact('types', 'foodstores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\FoodCreateRequest $request Food request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FoodCreateRequest $request)
    {
        try {
            $resultPlace = $this->placerepo->create(['place' => $request->place]);
            $result = $this->foodrepo->create([
                    'name_food' => $request->name_food,
                    'introduce' => $request->introduce,
                    'place_food_id' => $result_Place['id'],
                    'types_id' => $request->type,
                    'users_id' => 1,
                    'food_store_id' => $request->food_store,
                    'comment_id' => 1
                ]);
            if ($result) {
                if ($request->hasFile('image')) {
                    $files = $request->file('image');
                    foreach ($files as $file) {
                        $img = time() . '_' .$request->name_food.'.'.$file->getClientOriginalExtension();
                        $file-> move(config('path.foods'), $img);
                        $this->imagerepo->create([
                                'image' => $img,
                                'foods_id' => $result['id'],
                            ]);
                    }
                }
                Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_food.successful_message'));
                return redirect()->route('admin.food.index');
            } else {
                Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_food.successful_message'));
                return redirect()->route('admin.food.create');
            }
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food.error_message'));
            return redirect()->route('admin.food.create');
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
            $foods = $this->foodrepo->find($id);
            $images = $this->imagerepo->findByField('foods_id', $id);
            // dd($images);
            return  view('backend.foods.show', compact('foods', 'images'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect()->route('admin.food.index');
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
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food.danger_edit'));
        } else {
            $this->foodrepo->update($data, $id);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_food.edit_success'));
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
                        Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_food.delete_success'));
                    } else {
                        Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food.delete_fail'));
                    }
                } else {
                    Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food.delete_fail'));
                }
            } else {
                Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_food.delete_fail'));
            }
            return redirect() -> route('admin.food.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect() -> route('admin.food.index');
        }
    }
}
