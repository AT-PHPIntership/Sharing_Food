<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FoodsStore extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $table= 'food_stores';

    protected $fillable = [
        'name', 'information', 'users_id',
    ];
    /**
     * Get id from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function foodstoreuser()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
    /**
     * Get name from Food.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function foodimage()
    {
        return $this->hasMany('App\Model\Food');
    }
}
