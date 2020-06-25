<?php
	class Integrante{
		private $id_integrante;
		private $nombre;
		private $apellido;
		private $mail;

		function __construct(){}

		public function getNombre(){
		return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getApellido(){
			return $this->apellido;
		}

		public function setApellido($apellido){
			$this->apellido = $apellido;
		}

		public function getMail(){
		return $this->mail;
		}

		public function setMail($mail){
			$this->mail = $mail;
		}
		public function getId(){
			return $this->id_integrante;
		}

		public function setId($id_integrante){
			$this->id_integrante = $id_integrante;
		}
	}
?>