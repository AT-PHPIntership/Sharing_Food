<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository
 *
 * @package namespace App\Contracts\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
     /**
     * Function where
     *
     * @param string $field   field
     * @param string $value   value
     * @param array  $columns columns
     *
     * @return mixed
     */
    public function where($field, $value = null, $columns = ['email']);
}
