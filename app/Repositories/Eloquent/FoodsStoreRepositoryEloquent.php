<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\FoodsStoreRepository;
use App\Models\FoodsStore;
use App\Validators\FoodsStoreValidator;

/**
 * Class FoodsStoreRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class FoodsStoreRepositoryEloquent extends BaseRepository implements FoodsStoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FoodsStore::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     *
     * @return string
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
