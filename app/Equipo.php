<?php

namespace Incidencias;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table='equipo';

    protected $primaryKey='id';

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_dispositivo',
        'memoria',
        'procesador',
        'tarjeta_grafica',
        'tarjeta_red',
        'fuente_alimentacion'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        
    ];
}