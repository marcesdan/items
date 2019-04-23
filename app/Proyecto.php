<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed lider_id
 */
class Proyecto extends Model
{
    protected $table = 'proyecto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'fecha_estimada',
    ];

    /**
     * Los desarrolladores (users) que pertenecen a éste proyecto.
     */
    public function desarrolladores()
    {
        return $this->belongsToMany('App\Desarrollador', 'desarrollador_proyecto')
            ->using('App\AsignacionProyecto')
            ->withTimestamps();
    }

    /**
     * Los items que pertenecen a éste proyecto.
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    /**
     * El lider de éste proyecto.
     */
    public function lider()
    {
        return $this->belongsTo('App\Desarrollador', 'lider_id');
    }
}
