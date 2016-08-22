<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'users_id', 'ratings_id','foods_id',
    ];
    /**
     * Get id from Rating.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function rating()
    {
        return $this->hasOne('App\Rating', 'ratings_id');
    }
    /**
     * Get id from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function usercomment()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    /**
     * Get id from Food.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function foodcomment()
    {
        return $this->belongsTo('App\Food', 'foods_id');
    }
}
