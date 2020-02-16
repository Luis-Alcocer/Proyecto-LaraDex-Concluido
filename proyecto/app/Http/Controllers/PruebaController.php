<?php

namespace proyecto\Http\Controllers;

use proyecto\Http\Controllers\Controller;

class PruebaController extends Controller{
	public function prueba($param ){
		return 'Esto es una prueba de controlador :D y recibi este parametro ' . $param;
	}
}