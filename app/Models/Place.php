<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Place extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'places';

    protected $fillable = [
        'place',
    ];
    /**
     * Get name from Place.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function placefoods()
    {
        return $this->hasMany('App\Food');
    }
}
