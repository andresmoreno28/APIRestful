<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //Constantes de apoyo
    const VERIFIED_USER = '1';
    const NOT_VERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    //Propiedades que se ocultan cuando se envía formato JSON
    protected $hidden = [
        'password', 
        'remember_token',
        'verification_token',
    ];

    //Comprobar si el usuario es verificado
    public function isVerified(){
        return $this->verified == User::VERIFIED_USER;
    }

    public function isAdmin(){
        return $this->admin == User::ADMIN_USER;
    }

    public static function generateVerificationToken()
    {
        return str_random(40);
    }
}
