<?php
// incluye la clase Db
require_once('../conexion.php');

	class CrudIntegrante{
		public function __construct(){}

		public function insertar($integrante){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO integrantes values(NULL,:nombre,:apellido,:mail)');
			$insert->bindValue('nombre',$integrante->getNombre());
			$insert->bindValue('apellido',$integrante->getApellido());
			$insert->bindValue('mail',$integrante->getMail());
			$insert->execute();

		}

		public function mostrar(){
			$db=Db::conectar();
			$listaIntegrantes=[];
      $select=$db->query('SELECT * FROM integrantes');

			foreach($select->fetchAll() as $integrante){
				$myIntegrante= new Integrante();
				$myIntegrante->setId($integrante['id_integrante']);
				$myIntegrante->setNombre($integrante['nombre']);
				$myIntegrante->setApellido($integrante['apellido']);
				$myIntegrante->setMail($integrante['mail']);
				$listaIntegrantes[]=$myIntegrante;
			}
			return $listaIntegrantes;
		}

		public function eliminar($id_integrante){
			$db=Db::conectar();
			$borrar_relacion=$db->prepare('UPDATE tareas SET id_integrante = null WHERE id_integrante=:id_integrante');
			$borrar_relacion->bindValue('id_integrante',$id_integrante);
			$borrar_relacion->execute();

			$eliminar=$db->prepare('DELETE FROM integrantes WHERE id_integrante=:id_integrante');
			$eliminar->bindValue('id_integrante',$id_integrante);
			$eliminar->execute();
		}

		public function obtenerIntegrante($id_integrante){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM integrantes WHERE id_integrante=:id_integrante');
			$select->bindValue('id_integrante',$id_integrante);
			$select->execute();
			$integrante=$select->fetch();
			$myIntegrante= new Integrante();
			$myIntegrante->setId($integrante['id_integrante']);
			$myIntegrante->setNombre($integrante['nombre']);
			$myIntegrante->setApellido($integrante['apellido']);
			$myIntegrante->setMail($integrante['mail']);
			return $myIntegrante;
		}

		public function actualizar($integrante){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE integrantes SET nombre=:nombre, apellido=:apellido,mail=:mail
                         WHERE id_integrante=:id_integrante');
			$actualizar->bindValue('id_integrante',$integrante->getId());
			$actualizar->bindValue('nombre',$integrante->getNombre());
			$actualizar->bindValue('apellido',$integrante->getApellido());
			$actualizar->bindValue('mail',$integrante->getMail());
			$actualizar->execute();
		}
	}
