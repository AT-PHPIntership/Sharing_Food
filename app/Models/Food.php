<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Food extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'foods';

    protected $fillable = [
        'name_food', 'introduce', 'accept', 'place_food_id', 'types_id', 'users_id', 'food_store_id', 'comment_id',
    ];
    /**
     * Get name from role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image', 'foods_id', 'id');
    }
    /**
     * Get id from Comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'comments_id');
    }
    /**
     * Get id from type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function types()
    {
        return $this->belongsTo('App\Models\Type', 'types_id');
    }
    /**
     * Get id from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function usersid()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
    /**
     * Get id from Place.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function places()
    {
        return $this->belongsTo('App\Models\Place', 'place_food_id');
    }
    /**
     * Get id from Food_Store.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function foodsstore()
    {
        return $this->belongsTo('App\Models\FoodsStore', 'food_store_id');
    }
}
