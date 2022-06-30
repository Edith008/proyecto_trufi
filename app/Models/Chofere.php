<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chofere
 *
 * @property $id
 * @property $nombre
 * @property $ci
 * @property $direccion
 * @property $fnacimiento
 * @property $fafiliacion
 * @property $sexo
 * @property $licencia
 * @property $garantia
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Chofere extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'ci' => 'required',
		'direccion' => 'required',
		'fnacimiento' => 'required',
		'fafiliacion' => 'required',
		'sexo' => 'required',
		'licencia' => 'required',
		'garantia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','ci','direccion','fnacimiento','fafiliacion','sexo','licencia','garantia'];



}
