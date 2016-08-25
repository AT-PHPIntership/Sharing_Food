<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'foods';

    protected $fillable = [
        'name_food', 'introduce', 'accept', 'place_food_id', 'types_id', 'users_id', 'food_store_id', 'comments_id',
    ];
    /**
     * Get name from role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    /**
     * Get id from Comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'comments_id');
    }
    /**
     * Get id from type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function types()
    {
        return $this->belongsTo('App\Type', 'types_id');
    }
    /**
     * Get id from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function usersid()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    /**
     * Get id from Place.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function places()
    {
        return $this->belongsTo('App\Place', 'place_food_id');
    }
    /**
     * Get id from Food_Store.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function foodsstore()
    {
        return $this->belongsTo('App\Food_Store', 'food_store_id');
    }
}
