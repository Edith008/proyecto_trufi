<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bitacora
 *
 * @property $id
 * @property $detalle
 * @property $hora
 * @property $fecha
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bitacora extends Model
{
    
    static $rules = [
		'detalle' => 'required',
		'hora' => 'required',
		'fecha' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 60;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['detalle','hora','fecha','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
