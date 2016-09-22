<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\FoodRepositoryEloquent;
use Exception;
use Session;

class AcceptController extends Controller
{
    protected $foodrepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param FoodRepositoryEloquent $food the food repository
     *
     * @return void
     */
    public function __construct(FoodRepositoryEloquent $food)
    {
        $this->foodrepo = $food;
    }
    /**
     * Store a report to the database.
     *
     * @param Request $request the reporting request
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data= $request->all();
        $data['accept'] = $request->accept;
        $list = $this->foodrepo->find($request->foods_id);
        if (!empty($list)) {
            $datareturn = $this->foodrepo->update($data, $request->foods_id);
            return response()->json(['accept'=>$datareturn,'food'=>$request->foods_id,trans('lang_admin.mes')=>trans('lang_admin.update_food_accept')], config('define.success'));
        } else {
            return response()->json([trans('lang_admin.mes')=>trans('lang_admin.error_update_food_accept')]);
        }
    }
}
