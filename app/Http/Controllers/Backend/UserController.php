<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
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
        return view('backend.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\UserRequest $request User request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $img = null;
        if ($request->hasFile('image')) {
            $img = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image') -> move(config('path.avatar'), $img);
        }
        $data['avatar'] = $img;
        $data['password'] = bcrypt($request->password);
        $data['birthday'] = date(config('path.formatdate'), strtotime($request->birthday));
        $data['role_id'] = config('define.role_admin');
        $data['types_id'] = config('define.role_admin');
        try {
            $this->userrepo->create($data);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('lang_admin_manager_user.successful_message'));
            return redirect()->route('admin.user.index');
        } catch (Exception $e) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.error_message'));
            return redirect()->route('admin.user.create');
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
            $user = $this->userrepo->find($id);
            return  view('backend.users.show', compact('user'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect()->route('admin.user.index');
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
            $list = $this->userrepo->find($id);
            $roleuser = $this->rolerepo->all();
            return view('backend.users.edit', compact('list', 'roleuser'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
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
            $data['avatar'] = $imagename;
            $img->move(public_path(config('path.avatar')), $imagename);
        }
        $list = $this->userrepo->find($id);
        if (empty($list)) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.danger_edit'));
        } else {
            $this->userrepo->update($data, $id);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('lang_admin_manager_user.edit_success'));
        }
        return redirect() -> route('admin.user.index');
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
            $count = $this->userrepo->find($id);
            if (!empty($count)) {
                $result = $this->userrepo->delete($id);
                if ($result) {
                    Session::flash(trans('lang_admin_manager_user.success_cf'), trans('lang_admin_manager_user.delete_success'));
                } else {
                    Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
                }
            } else {
                Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
            }
            return redirect() -> route('admin.user.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect() -> route('admin.user.index');
        }
    }
}
