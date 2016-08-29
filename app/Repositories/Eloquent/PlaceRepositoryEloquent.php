<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\PlaceRepository;
use App\Models\Place;
use App\Validators\PlaceValidator;

/**
 * Class PlaceRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PlaceRepositoryEloquent extends BaseRepository implements PlaceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Place::class;
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
