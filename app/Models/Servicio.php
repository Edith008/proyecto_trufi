<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $trufi_id
 * @property $hsalida
 * @property $hllegada
 * @property $fecha
 * @property $observacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Trufi $trufi
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    
    static $rules = [
		'trufi_id' => 'required',
		'hsalida' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['trufi_id','hsalida','hllegada','fecha','observacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function trufi()
    {
        return $this->hasOne('App\Models\Trufi', 'id', 'trufi_id');
    }
    

}
