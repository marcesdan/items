<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EstadoTipoItem extends Pivot
{
	protected $table = 'estado_tipo_item';
    public $timestamps = false;
}
