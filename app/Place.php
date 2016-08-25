<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
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
