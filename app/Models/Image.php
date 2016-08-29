<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Image extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'images';

    protected $fillable = [
        'image', 'foods_id',
    ];
    /**
     * Get id from Image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function foodimage()
    {
        return $this->belongsTo('App\Food', 'foods_id');
    }
}
