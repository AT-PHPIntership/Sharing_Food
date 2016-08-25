<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
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
        return $this->hasMany('App\Food');
    }
}
