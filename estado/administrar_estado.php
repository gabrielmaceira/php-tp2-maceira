<?php
require_once('crud_estados.php');
require_once('estado.php');

$crud= new CrudEstado();
$estado= new Estado();

	if (isset($_POST['insertar'])) {
		$estado->setDescripcion($_POST['descripcion']);

		$crud->insertar($estado);
		header('Location: ver_estados.php');

	}elseif(isset($_POST['actualizar'])){
		$estado->setId($_POST['id_estado']);
		$estado->setDescripcion($_POST['descripcion']);
		$crud->actualizar($estado);
		header('Location: ver_estados.php');

	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id_estado']);
		header('Location: ver_estados.php');		

	}elseif($_GET['accion']=='a'){
		header('Location: ver_estados.php');
	}
?>