<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $table = 'workflow';
    public $timestamps = false;

    /**
     * El estado desde de donde parte este workflow. El nodo inicio de la arista
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoFrom() {
        return $this->belongsTo('App\Estado', 'estado_from_id');
    }

    /**
     * El estado hacia donde se dirige éste workflow. El nodo destino de la arista
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoTo() {
        return $this->belongsTo('App\Estado', 'estado_to_id');
    }

    /**
     * El tipo de item asociado a éste workflow. El grafo dirigido.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoItem() {
        return $this->belongsTo('App\TipoItem', 'tipo_item_id');
    }
}
