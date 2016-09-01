<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use TransformableTrait;

    protected $table= 'users';
    
    protected $fillable = [
        'username', 'email', 'password', 'avatar', 'fullname', 'address', 'birthday', 'phone', 'information', 'role_id', 'types_id',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Get name from Food_Store.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foodstore()
    {
        return $this->hasMany('App\Models\Food_Store');
    }
    /**
     * Get id from role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'role_id');
    }
     /**
     * Get comment from Comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
     /**
     * Get food from Food.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function food()
    {
        return $this->hasMany('App\Models\Food');
    }
    /**
     * Get id from Type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function type()
    {
        return $this->hasOne('App\Models\Type', 'types_id');
    }
}
