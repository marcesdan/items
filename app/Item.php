<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @mixin Eloquent
 */
class Item extends Model
{
    protected $table = 'item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'fecha_estimada',
    ];

    /**
     * El tipo de ítem de este ítem
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoItem()
    {
        return $this->belongsTo('App\TipoItem');
    }

    /**
     * El proyecto al que pertenece este ítem
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }


    /**
     * Los desarrolladores que pertenecen a éste proyecto.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function desarrolladores()
    {
        return $this->belongsToMany('App\Desarrollador', 'desarrollador_item')
            ->using('App\AsignacionItem')
            ->withTimestamps();
    }

    /**
     * Setea el estado del ítem. Requiere llamar posteriormente al método save
     * @param $responsable , el responsable del ítem
     * @param $estado , el nuevo estado al que pasa el ítem
     */
    public function setEstadoActual($responsable, $estado)
    {
        $newHistory = new EstadoHistory();
        $newHistory->responsable()->associate($responsable);
        $newHistory->estado()->associate($estado);
        $newHistory->item()->associate($this);
        $newHistory->save();
    }

    /**
     * Devuelve el estado actual del ítem. Incluye el responsable y el estado
     * @return EstadoHistory
     */
    public function getEstadoActual()
    {
        return EstadoHistory::where('item_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    /**
     * Devuelve el hitorial del ítem. Incluye todos sus responsables junto con sus estados
     */
    public function getHistorial()
    {
        return EstadoHistory::where('item_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Devuelve el responsable actual del ítem.
     * @return Desarrollador
     */
    public function getResponsable()
    {
        return $this->getEstadoActual()->responsable;
    }
}
