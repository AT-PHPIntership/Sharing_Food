<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Type extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'types';
    
    protected $fillable = [
        'type',
    ];
    /**
     * Get name from Type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function foodtype()
    {
        return $this->hasMany('App\Models\Food');
    }
}
