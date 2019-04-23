<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed responsable
 */
class EstadoHistory extends Model
{
    protected $table = 'estado_history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * Los ítems que poseen este tipo de ítem
     */
    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    /**
     * Los ítems que poseen este tipo de ítem
     */
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    /**
     * Los ítems que poseen este tipo de ítem
     */
    public function responsable()
    {
        return $this->belongsTo('App\Desarrollador');
    }
}
