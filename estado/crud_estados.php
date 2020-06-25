<?php
// incluye la clase Db
require_once('../conexion.php');

	class CrudEstado{
		public function __construct(){}

		public function insertar($estado){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO estados values(NULL,:descripcion)');
			$insert->bindValue('descripcion',$estado->getDescripcion());
			$insert->execute();

		}

		public function mostrar(){
			$db=Db::conectar();
			$listaEstados=[];
      $select=$db->query('SELECT * FROM estados');

			foreach($select->fetchAll() as $estado){
				$myEstado= new Estado();
				$myEstado->setId($estado['id_estado']);
				$myEstado->setDescripcion($estado['descripcion']);
				$listaEstados[]=$myEstado;
			}
			return $listaEstados;
		}

		public function eliminar($id_estado){
			$db=Db::conectar();
			$borrar_relacion=$db->prepare('UPDATE tareas SET estado = null WHERE estado=:id_estado');
			$borrar_relacion->bindValue('id_estado',$id_estado);
			$borrar_relacion->execute();

			$eliminar=$db->prepare('DELETE FROM estados WHERE id_estado=:id_estado');
			$eliminar->bindValue('id_estado',$id_estado);
			$eliminar->execute();
		}

		public function obtenerEstado($id_estado){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM estados WHERE id_estado=:id_estado');
			$select->bindValue('id_estado',$id_estado);
			$select->execute();
			$estado=$select->fetch();
			$myEstado= new Estado();
			$myEstado->setId($estado['id_estado']);
			$myEstado->setDescripcion($estado['descripcion']);
			return $myEstado;
		}

		public function actualizar($estado){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE estados SET descripcion=:descripcion WHERE id_estado=:id_estado');
			$actualizar->bindValue('id_estado',$estado->getId());
			$actualizar->bindValue('descripcion',$estado->getDescripcion());
			$actualizar->execute();
		}
	}
