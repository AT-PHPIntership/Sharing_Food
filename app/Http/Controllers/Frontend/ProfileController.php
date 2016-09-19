<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Frontend\ProfileRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use Exception;
use Session;
use Auth;

class ProfileController extends Controller
{
    protected $userrepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent $user the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->userrepo = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.profile.index');
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
            $list = $this->userrepo->find($id);
            return view('frontend.profile.edit', compact('list'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_user.no_id'));
            return redirect()->route('profile.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Frontend\ProfileRequest $request request
     * @param int                                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time() . '_'.$data['name'] .'.'. $img->getClientOriginalExtension();
            $data['avatar'] = $imagename;
            $img->move(public_path(config('path.avatar')), $imagename);
        }
        $list = $this->userrepo->find($id);
        if (empty($list)) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_user.danger_edit'));
        } else {
            $this->userrepo->update($data, $id);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('lang_user.edit_success'));
        }
        return redirect() -> route('home');
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
