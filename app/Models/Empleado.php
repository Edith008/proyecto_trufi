<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $user_id
 * @property $registrado_por
 * @property $ci
 * @property $direccion
 * @property $fnacimiento
 * @property $fafiliacion
 * @property $sexo
 * @property $cargo
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'registrado_por' => 'required',
		'ci' => 'required',
		'direccion' => 'required',
		'fnacimiento' => 'required',
		'fafiliacion' => 'required',
		'sexo' => 'required',
		'cargo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','registrado_por','ci','direccion','fnacimiento','fafiliacion','sexo','cargo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
