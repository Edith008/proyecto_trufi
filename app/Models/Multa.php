<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Multa
 *
 * @property $id
 * @property $razon
 * @property $fecha
 * @property $monto
 * @property $estado
 * @property $socio
 * @property $empleado
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Multa extends Model
{
    
    static $rules = [
		'razon' => 'required',
		'fecha' => 'required',
		'monto' => 'required',
		'estado' => 'required',
		'socio' => 'required',
		'empleado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['razon','fecha','monto','estado','socio','empleado'];

    public function socios()
    {
        return $this->hasOne('App\Models\Socio', 'id', 'socio');
    }

}
