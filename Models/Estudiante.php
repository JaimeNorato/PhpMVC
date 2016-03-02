<?php namespace Models;

	class Estudiante{
		private $id;
		private $nombre;
		private $edad;
		private $promedio;
		private $imagen;
		private $id_seccion;
		private $fecha;
		private $con;

		public function __construct(){
			$this->con=new Conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){
			$sql = "SELECT t1.*, t2.nombre as nombre_seccion FROM Estudiantes t1 INNER JOIN Secciones t2 ON t1.id_seccion = t2.id";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO Estudiantes(id, nombre, edad, promedio, imagen, id_seccion, fecha)
					VALUES(null, '{$this->nombre}', '{$this->edad}', '{$this->promedio}', '{$this->imagen}',
						'{$this->id_seccion}', NOW())";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM Estudiantes WHERE id = '{$this->id}'";
			$this->con->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE Estudiantes SET nombre = '{$this->nombre}', edad = '{$this->edad}',
					promedio = '{$this->promedio}', id_seccion = '{$this->id_seccion}' WHERE id = '{$this->id}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT t1.*, t2.nombre as nombre_seccion FROM Estudiantes t1 INNER JOIN Secciones t2 
				    ON t1.id_seccion = t2.id WHERE t1.id = '{$this->id}'";
			$datos = $this->con->consultaRetorno($sql);
			$row= mysqli_fetch_assoc($datos);
			return $row;
		}
	}
?>