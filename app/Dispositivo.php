<?php

namespace Incidencias;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table='dispositivo';

    protected $primarykey='id';

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'direccion_ip',
        'marca',
        'modelo',
        'id_ubicacion', //clave foránea a la tabla ubicaciones

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        
    ];
}