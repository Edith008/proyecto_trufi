<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gruporuta
 *
 * @property $id
 * @property $ruta_id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Ruta $ruta
 * @property Trufi[] $trufis
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gruporuta extends Model
{
    
    static $rules = [
		'ruta_id' => 'required',
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ruta_id','nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ruta()
    {
        return $this->hasOne('App\Models\Ruta', 'id', 'ruta_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trufis()
    {
        return $this->hasMany('App\Models\Trufi', 'gruporuta_id', 'id');
    }
    

}
