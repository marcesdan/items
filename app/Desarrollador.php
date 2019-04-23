<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property mixed nombre
 * @property mixed apellido
 * @property mixed email
 * @property mixed telefono
 * @property mixed password
 * @property string username
 */
class Desarrollador extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'desarrollador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'username', 'email', 'telefono', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Los proyectos a los que está asignado éste desarrollador.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto', 'desarrollador_proyecto')
            ->using('App\AsignacionProyecto')
            ->withTimestamps();
    }

    /**
     * Los proyectos a los que está asignado éste desarrollador.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany('App\Item', 'desarrollador_item')
            ->using('App\AsignacionItem')
            ->withTimestamps();
    }

    /**
     * Retorna los proyectos liderados por este desarrollador
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectosLiderados()
    {
        return $this->hasMany('App/Proyecto', 'lider_id');
    }

//    /**
//     * Retorna los items los cuales este desarrollador es responsable
//     */
//    public function itemsComoResponsable()
//    {
//        return $this->hasMany('App/Item', 'responsable_id');
//    }

    /**
     * True si el usuario es un administrador. Se accede a este método con $des->admin
     * @return boolean
     */
    public function getAdminAttribute()
    {
        return $this->hasRole('admin');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->apellido} {$this->nombre}";
    }
}
