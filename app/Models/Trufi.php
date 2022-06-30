<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trufi
 *
 * @property $id
 * @property $chofer_id
 * @property $vehiculo_id
 * @property $gruporuta_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Chofere $chofere
 * @property Gruporuta $gruporuta
 * @property Vehiculo $vehiculo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Trufi extends Model
{
    
    static $rules = [
		'chofer_id' => 'required',
		'vehiculo_id' => 'required',
		'gruporuta_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['chofer_id','vehiculo_id','gruporuta_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function chofere()
    {
        return $this->hasOne('App\Models\Chofere', 'id', 'chofer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gruporuta()
    {
        return $this->hasOne('App\Models\Gruporuta', 'id', 'gruporuta_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehiculo()
    {
        return $this->hasOne('App\Models\Vehiculo', 'id', 'vehiculo_id');
    }
    

}
