<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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