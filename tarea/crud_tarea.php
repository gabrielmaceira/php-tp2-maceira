<?php
// incluye la clase Db
if(file_exists('conexion.php')){
  require_once('conexion.php');
}

if(file_exists('../conexion.php')){
  require_once('../conexion.php');
}
class CrudTarea
{
	public function __construct()
	{
	}

	public function insertar($tarea)
	{
		$db = Db::conectar();
		$insert = $db->prepare('INSERT INTO tareas values
			(NULL,:fecha_tarea,:desc_tarea,:duracion_tarea,:estado,:id_integrante,:observaciones)');

		$insert->bindValue('fecha_tarea', $tarea->getFecha());
		$insert->bindValue('desc_tarea', $tarea->getDescripcion());
		$insert->bindValue('duracion_tarea', $tarea->getDuracion());
		$insert->bindValue('estado', $tarea->getEstado());
		$insert->bindValue('id_integrante', $tarea->getIntegrante());
		$insert->bindValue('observaciones', $tarea->getObservaciones());
		$insert->execute();
	}

	public function mostrar()
	{
		$db = Db::conectar();
		$listaTareas = [];
		$select = $db->query('SELECT *, DATE_ADD(fecha_tarea, INTERVAL duracion_tarea DAY) as "fecha_fin" FROM tareas t 
		left JOIN integrantes i on t.id_integrante = i.id_integrante
        left join estados e on t.estado = e.id_estado
		order by t.estado, t.fecha_tarea');

		foreach ($select->fetchAll() as $tarea) {
			$myTarea = new Tarea();
			$myTarea->setId($tarea['id_tarea']);
			$myTarea->setFecha($tarea['fecha_tarea']);
			$myTarea->setDescripcion($tarea['desc_tarea']);
			$myTarea->setDuracion($tarea['duracion_tarea']);
			$myTarea->setEstado($tarea['estado']);
			$myTarea->setIntegrante($tarea['id_integrante']);
			$myTarea->setObservaciones($tarea['observaciones']);
			$myTarea->setIntegranteTexto($tarea['nombre']." ".$tarea['apellido']);
			$myTarea->setEstadoTexto($tarea['descripcion']);
			$myTarea->setFechaFin($tarea['fecha_fin']);
			$listaTareas[] = $myTarea;
		}
		return $listaTareas;
	}

	public function eliminar($id_tarea)
	{
		$db = Db::conectar();
		$eliminar = $db->prepare('DELETE FROM tareas WHERE id_tarea=:id_tarea');
		$eliminar->bindValue('id_tarea', $id_tarea);
		$eliminar->execute();
	}

	public function obtenerTarea($id_tarea)
	{
		$db = Db::conectar();
		$select = $db->prepare('SELECT * FROM tareas WHERE id_tarea=:id_tarea');
		$select->bindValue('id_tarea', $id_tarea);
		$select->execute();
		$tarea = $select->fetch();
		$myTarea = new Tarea();
		$myTarea->setId($tarea['id_tarea']);
		$myTarea->setFecha($tarea['fecha_tarea']);
		$myTarea->setDescripcion($tarea['desc_tarea']);
		$myTarea->setDuracion($tarea['duracion_tarea']);
		$myTarea->setEstado($tarea['estado']);
		$myTarea->setIntegrante($tarea['id_integrante']);
		$myTarea->setObservaciones($tarea['observaciones']);
		return $myTarea;
	}

	public function actualizar($tarea)
	{
		$db = Db::conectar();
		$actualizar = $db->prepare('UPDATE tareas SET 
			fecha_tarea=:fecha_tarea,
			desc_tarea=:desc_tarea,
			duracion_tarea=:duracion_tarea,
			estado=:estado,
			id_integrante=:id_integrante,
			observaciones=:observaciones
			WHERE id_tarea=:id_tarea');

		$actualizar->bindValue('id_tarea', $tarea->getId());
		$actualizar->bindValue('fecha_tarea', $tarea->getFecha());
		$actualizar->bindValue('desc_tarea', $tarea->getDescripcion());
		$actualizar->bindValue('duracion_tarea', $tarea->getDuracion());
		$actualizar->bindValue('estado', $tarea->getEstado());
		$actualizar->bindValue('id_integrante', $tarea->getIntegrante());
		$actualizar->bindValue('observaciones', $tarea->getObservaciones());
		$actualizar->execute();
	}
}
