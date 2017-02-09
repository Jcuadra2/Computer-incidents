<?php

namespace Incidencias;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';

    protected $primaryKey="id";

    protected $fillable = [
        'user',
        'Dni', 
        'password',
        'Nombre',
        'Tipo',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];
}
