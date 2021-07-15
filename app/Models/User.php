<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //roles mapper

    public static $rolesMapper = ["MODERATOR"=>0,"SUPER_MODERATOR"=>1];

    public function isModerator() {
       return $this->role == $this::$rolesMapper["MODERATOR"];
    }

    public function isSuperModerator() {
        return $this->role == $this::$rolesMapper["SUPER_MODERATOR"];
    }

    protected $fillable = [
        'name',
        "role",
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
