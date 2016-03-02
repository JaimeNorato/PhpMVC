<?php namespace Config;
	
	class Autoload{
		/**
		*funcion encargada de auto cargar cadauna de las librerias o clases requeridas 
		*en el codigo
		*/
		public static function run(){
			spl_autoload_register(function($class){
				$ruta = str_replace("\\", "/", $class) . ".php";
				if (is_readable($ruta)) {
						include_once $ruta;
					}	
			});
		}
	}
?>