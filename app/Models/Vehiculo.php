<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 *
 * @property $id
 * @property $socio_id
 * @property $marca
 * @property $matricula
 * @property $modelo
 * @property $ruat
 * @property $estado
 * @property $soat
 * @property $created_at
 * @property $updated_at
 *
 * @property Socio $socio
 * @property Trufi[] $trufis
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehiculo extends Model
{
    
    static $rules = [
		'socio_id' => 'required',
		'marca' => 'required',
		'matricula' => 'required',
		'modelo' => 'required',
		'ruat' => 'required',
		'estado' => 'required',
		'soat' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['socio_id','marca','matricula','modelo','ruat','estado','soat'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function socio()
    {
        return $this->hasOne('App\Models\Socio', 'id', 'socio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trufis()
    {
        return $this->hasMany('App\Models\Trufi', 'vehiculo_id', 'id');
    }
    

}
