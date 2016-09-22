<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Eloquent\FoodRepositoryEloquent;
use App\Repositories\Eloquent\ImageRepositoryEloquent;
use App\Repositories\Eloquent\TypeRepositoryEloquent;
use App\Repositories\Eloquent\CommentRepositoryEloquent;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\PlaceRepositoryEloquent;
use App\Repositories\Eloquent\FoodsStoreRepositoryEloquent;
use App\Http\Controllers\Controller;

class SearchController extends Controller
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
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getjson()
    {
        $food= $this->foodrepo->all();
        return response()->json($food);
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Frontend\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function getresuch(Request $request)
    {
        $foods = $this->foodrepo->with('images')->findByField('name_food', $request->search);
        foreach ($foods as $key => $value) {
            if ($value['accept'] != 0) {
                $foodList[]=$value;
                $image=$value['images']->first();
                $foodList[$key]['image']=$image['image'];
            }
        }
        return response()->json($foodList);
    }
}
