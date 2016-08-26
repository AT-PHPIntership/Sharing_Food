<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodsStore extends Model
{
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
        return $this->belongsTo('App\User', 'users_id');
    }
    /**
     * Get name from Food.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function foodimage()
    {
        return $this->hasMany('App\Food');
    }
}
