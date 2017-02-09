<?php

namespace Incidencias;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table='incidencia';

    protected $primaryKey='id';

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hora',
        'fecha',
        'observaciones',
        'enviada',
        'vista',
        'id_dispositivo',
        'id_usuario' 

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        
    ];
}