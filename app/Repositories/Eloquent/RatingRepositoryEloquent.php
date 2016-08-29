<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\RatingRepository;
use App\Models\Rating;
use App\Validators\RatingValidator;

/**
 * Class RatingRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class RatingRepositoryEloquent extends BaseRepository implements RatingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rating::class;
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
