<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
	//Se establecen los elementos de la bd que se pueden modificar
	protected $fillable = ['name', 'avatar'];
    /**
 * Get the route key for the model.
 *
 * @return string
 */

    //Personaliza el nombre e la clave
public function getRouteKeyName()
{
    return 'slug';
}
public function pokemons(){
	return $this->hasMany('proyecto\Pokemon');
}
}
