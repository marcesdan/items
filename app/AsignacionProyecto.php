<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AsignacionProyecto extends Pivot
{
	protected $table = 'desarrollador_proyecto';
}
