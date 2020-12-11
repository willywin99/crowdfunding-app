<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UsesUuid;

class User extends Authenticatable
{
    use Notifiable, UsesUuid;

    public function getRoleId()
    {
        # code...
        $role = \App\Role::where('name', 'user')->first();
        return $role->id;
    }

    public static function boot()
    {
        # code...
        parent::boot();
        static::creating(function($model) {
            $model->role_id = $model->getRoleId();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // protected $guarded = [];

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

    public function isAdmin()
    {
        # code...
        if($this->role_id === $this->getRoleId()) {
            return false;
        }
        return true;
    }
}
