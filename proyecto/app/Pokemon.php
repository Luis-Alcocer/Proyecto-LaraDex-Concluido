<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
   
   public function trainer(){
   	return $this->belongsTo('proyecto\Trainer');
   }

}
