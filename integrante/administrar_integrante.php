<?php
require_once('crud_integrantes.php');
require_once('integrante.php');

$crud= new CrudIntegrante();
$integrante= new Integrante();

	if (isset($_POST['insertar'])) {
		$integrante->setNombre($_POST['nombre']);
		$integrante->setApellido($_POST['apellido']);
		$integrante->setMail($_POST['mail']);

		$crud->insertar($integrante);
		header('Location: ver_integrantes.php');

	}elseif(isset($_POST['actualizar'])){
		$integrante->setId($_POST['id_integrante']);
		$integrante->setNombre($_POST['nombre']);
		$integrante->setApellido($_POST['apellido']);
		$integrante->setMail($_POST['mail']);
		$crud->actualizar($integrante);
		header('Location: ver_integrantes.php');

	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id_integrante']);
		header('Location: ver_integrantes.php');		

	}elseif($_GET['accion']=='a'){
		header('Location: ver_integrantes.php');
	}
?>