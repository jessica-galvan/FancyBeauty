<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscriber extends Model{
    public $table = 'suscribers';
    public $fillable = ['email'];
}
