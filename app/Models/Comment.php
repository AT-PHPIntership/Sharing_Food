<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'comments';

    protected $fillable = [
        'body', 'users_id', 'ratings_id',
    ];
    /**
     * Get id from Rating.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function rating()
    {
        return $this->hasOne('App\Models\Rating', 'ratings_id');
    }
    /**
     * Get id from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function usercomment()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
    /**
     * Get id from Food.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function foodcomment()
    {
        return $this->belongsTo('App\Models\Food');
    }
}
