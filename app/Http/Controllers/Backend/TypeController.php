<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\TypeEditRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TypeRepositoryEloquent;
use Exception;
use Session;

class TypeController extends Controller
{
    protected $typerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param TypeRepositoryEloquent $type the type repository
     *
     * @return void
     */
    public function __construct(TypeRepositoryEloquent $type)
    {
        $this->typerepo = $type;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types= $this->typerepo->all();
        return view('backend.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\TypeRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $data = $request->all();
        try {
            $this->typerepo->create($data);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_type.successful_message'));
            return redirect()->route('admin.type.index');
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_type.error_message'));
            return redirect()->route('admin.type.create');
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $list = $this->typerepo->find($id);
            return view('backend.types.edit', compact('list'));
        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect()->route('admin.type.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\TypeEditRequest $request request
     * @param int                              $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TypeEditRequest $request, $id)
    {
        $data = $request->all();
        $list = $this->typerepo->find($id);
        if (empty($list)) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('admin_manager_type.danger_edit'));
        } else {
            $this->typerepo->update($data, $id);
            Session::flash(trans('lang_admin_manager_user.success_cf'), trans('admin_manager_type.edit_success'));
        }
        return redirect() -> route('admin.type.index');
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
            $count = $this->typerepo->find($id);
            if (!empty($count)) {
                $result = $this->typerepo->delete($id);
                if ($result) {
                    Session::flash(trans('lang_admin_manager_user.success_cf'), trans('lang_admin_manager_user.delete_success'));
                } else {
                    Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
                }
            } else {
                Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
            }
            return redirect() -> route('admin.type.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect() -> route('admin.type.index');
        }
    }
}
