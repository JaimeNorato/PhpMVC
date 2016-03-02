<?php namespace Models;
	/**
	* clase encargada de administrar la conexion con la base de daatos
	*/
	class Conexion{

		private $datos = array(
			"host" => "localhost",
			"user" => "root",
			"pass" => "neydi.4312",
			"db"   => "tutophp"
		);
		private $con;

		function __construct()
		{
			$this->con = new \mysqli($this->datos["host"],$this->datos["user"],
				 $this->datos["pass"],$this->datos["db"]);
		}

		public function consultaSimple($sql){
			$this->con->query($sql);
		}

		public function consultaRetorno($sql){
			//echo "<br>".$sql."<br>";
			$datos=$this->con->query($sql);
			return $datos;
		}
	}
?>