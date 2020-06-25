<?php
require_once('crud_tarea.php');
require_once('tarea.php');

$crud = new CrudTarea();
$tarea = new Tarea();

if (isset($_POST['insertar'])) {
	$tarea->setDescripcion($_POST['desc_tarea']);
	$tarea->setFecha($_POST['fecha_tarea']);
	if ($_POST['estado'] == 0 || $_POST['estado'] == "0") {
		$tarea->setEstado(null);
	} else {
		$tarea->setEstado($_POST['estado']);
	}
	if ($_POST['integrante'] == 0 || $_POST['integrante'] == "0") {
		$tarea->setIntegrante(null);
	} else {
		$tarea->setIntegrante($_POST['integrante']);
	}
	$tarea->setObservaciones($_POST['observaciones']);
	$tarea->setDuracion($_POST['duracion_tarea']);

	$crud->insertar($tarea);
	header('Location: ../index.php');

} elseif (isset($_POST['actualizar'])) {
	$tarea->setId($_POST['id_tarea']);
	$tarea->setDescripcion($_POST['desc_tarea']);
	$tarea->setFecha($_POST['fecha_tarea']);
	if ($_POST['estado'] == 0 || $_POST['estado'] == "0") {
		$tarea->setEstado(null);
	} else {
		$tarea->setEstado($_POST['estado']);
	}
	if ($_POST['integrante'] == 0 || $_POST['integrante'] == "0") {
		$tarea->setIntegrante(null);
	} else {
		$tarea->setIntegrante($_POST['integrante']);
	}
	$tarea->setObservaciones($_POST['observaciones']);
	$tarea->setDuracion($_POST['duracion_tarea']);
	$crud->actualizar($tarea);
	header('Location: ../index.php');
} elseif ($_GET['accion'] == 'e') {
	$crud->eliminar($_GET['id_tarea']);
	header('Location: ../index.php');
} elseif ($_GET['accion'] == 'a') {
	header('Location: ../index.php');
}
