<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Frontend\CommentRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\CommentRepositoryEloquent;
use App\Repositories\Eloquent\RatingRepositoryEloquent;
use App\Repositories\Eloquent\UserRepositoryEloquent;

class CommentController extends Controller
{
    protected $commentrepo;
    protected $ratingrepo;
    protected $userrepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param CommentRepositoryEloquent $comment the comment repository
     * @param RatingRepositoryEloquent  $rating  the rating repository
     * @param UserRepositoryEloquent    $user    the user repository
     *
     * @return void
     */
    public function __construct(CommentRepositoryEloquent $comment, RatingRepositoryEloquent $rating, UserRepositoryEloquent $user)
    {
        $this->commentrepo = $comment;
        $this->ratingrepo = $rating;
        $this->userrepo =$user;
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
    public function store(CommentRequest $request)
    {
        if ($request->ajax()) {
            $rating = $this->ratingrepo->create([
                    'rating' => $request->ratings_id,
                ]);
            $comment = $this->commentrepo->create([
                    'body' =>$request->body,
                    'users_id' =>$request->users_id,
                    'ratings_id' => $rating['id'],
                    'foods_id' => $request->foods_id
                ]);
            $user=$this->userrepo->findByField('id', $comment['users_id'], ['username']);
            $comment['name']=$user[config('define.result_cmt')]['username'];
            return $comment ? response()->json($comment): response()->json(['responseText' => trans('lang_user.comments.error_comment')], config('define.HTTP_BAD_REQUEST_STATUS'));
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
     * @param \Illuminate\Http\Request $request the request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $deleting = $this->commentrepo->delete($request->commentId);
            return $deleting ? response()->json(['commentID' => $request->commentId], config('define.HTTP_CREATED_STATUS'))
                             : response()->json(['responseText' => trans('lang_user.comments.delete_fail')], config('define.HTTP_BAD_REQUEST_STATUS'));
        }
    }
}
