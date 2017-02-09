<?php

namespace Incidencias;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estado';

    protected $primaryKey='id';

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        
    ];
}