<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TypeRepository;
use App\Models\Type;
use App\Validators\TypeValidator;

/**
 * Class TypeRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class TypeRepositoryEloquent extends BaseRepository implements TypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Type::class;
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
