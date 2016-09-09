<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
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
        //
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
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            $images = $this->imagerepo->all();
            return  view('frontend.foods.show', compact('foods', 'images'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect()->route('home');
        }
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
