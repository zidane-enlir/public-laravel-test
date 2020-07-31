<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets()
    {
        return $this->hasMany('App\Models\Tweet');
    }

    /**
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userProfile()
    {
        return $this->hasOne('App\Models\UserProfile');
    }

    /**
     * @return App\Models\User
     */
    public function getIdenticalUser($id)
    {
        return User::find($id);
    }
}
