<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed lider_id
 */
class Estado extends Model
{
    protected $table = 'estado';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion'
    ];
}
