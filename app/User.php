<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'name', 'surname', 'email', 'password', 'foto', 'tipoPiel', 'tonoPiel', 'provincia', 'genero', 'date_of_birth', 'rol',
    ];

    protected $hidden = [
        'password', 'remember_token', 'rol',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carrito(){
      return $this->hasMany('App\Carrito', 'user_id');
    }
}
