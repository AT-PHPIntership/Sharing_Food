<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use Auth;

class ChangesImageController extends Controller
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
     * Store a report to the database.
     *
     * @param Request $request the reporting request
     *
     * @return Illuminate\Http\Response
     */
    public function postUpload(Request $request)
    {
        $data= $request->all();
        $folderPath = config('path.avatar');
        $file = $request->file('file');
        $filename = '';
        if (null != $file) {
            $filename = time() . '_'.$file->getClientOriginalName().'.'. $file->getClientOriginalExtension();
            $upload_success = $file->move($folderPath, $filename);
            $data['avatar'] = $filename;
        }
        $list = $this->userrepo->find(Auth::user()->id);
        if (!empty($list)) {
            $datareturn = $this->userrepo->update($data, Auth::user()->id);
            return response()->json(['avatar'=>$datareturn,trans('lang_user.profile.mes')=>trans('lang_user.profile.update_avatar')], config('define.success'));
        } else {
            return response()->json([trans('lang_user.profile.mes')=>trans('lang_user.profile.error_update_avatar')]);
        }
    }
}
