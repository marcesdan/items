<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed nombre
 */
class TipoItem extends Model
{
    protected $table = 'tipo_item';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion'
    ];

    /**
     * Los ítems que poseen este tipo de ítem
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    /**
     * Los estados posibles de este tipo de item. Los nodos del grafo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function estados()
    {
        return $this->belongsToMany('App\Estado', 'estado_tipo_item')
            ->using('App\EstadoTipoItem');
    }

    /**
     * Las transiciones posibles entre los estados de este tipo de item.
     * Las aristas del grafo.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workflow()
    {
        return $this->hasMany('App\Workflow');
    }
}
