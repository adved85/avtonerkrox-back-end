<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Statement;
use App\Roles;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_name','role_id','phone_number','passport',
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

    public function statement() {
        return $this->hasMany(Statement::class);
    }

    public function role()
    {
        return $this->BelongsTo('App\Roles');
    }

    public function hasRole($role)
    {
        return null !== $this->role()->where('role_name', $role)->first();
    }

    public function isAdmin($role)
    {
        if ($this->hasRole($role)) {
            $role = $this->role()->first();
            return ($role->role_name === 'admin')? true : false;
        }
    }

    
}
