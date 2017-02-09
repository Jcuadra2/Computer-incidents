<?php

namespace Incidencias;

use Illuminate\Database\Eloquent\Model;

class Gadget extends Model
{
    protected $table='gadget';

    protected $primaryKey='id';

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_dispositivo',
        'tipo'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        
    ];
}