<?php
	class Estado{
		private $id_estado;
		private $descripcion;

		function __construct(){}

		public function getDescripcion(){
		return $this->descripcion;
		}

		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}

		public function getId(){
			return $this->id_estado;
		}

		public function setId($id_estado){
			$this->id_estado = $id_estado;
		}
	}
?>