<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\RoleRepositoryEloquent;
use Exception;
use Session;

class UserController extends Controller
{
    protected $userrepo;
    protected $rolerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent $user the user repository
     * @param RoleRepositoryEloquent $role the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user, RoleRepositoryEloquent $role)
    {
        $this->userrepo = $user;
        $this->rolerepo = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= $this->userrepo->all();
        return view('backend.users.index', compact('users'));
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
            $roleuser = $this->rolerepo->all();
            return view('backend.users.edit', compact('list', 'roleuser'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin_manager_user.no_id'));
            return redirect()->route('admin.user.index');
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
    public function update(UserEditRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time() . '_'.$data['name'] .'.'. $img->getClientOriginalExtension();
            $data['image'] = $imagename;
            $img->move(public_path(config('path.avatar')), $imagename);
        }
        $list = $this->userrepo->find($id);
        if (empty($list)) {
            Session::flash('danger', trans('lang_admin_manager_user.danger_edit'));
        } else {
            $this->userrepo->update($data, $id);
            Session::flash('success', trans('lang_admin_manager_user.edit_success'));
        }
        return redirect() -> route('admin.user.index');
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
