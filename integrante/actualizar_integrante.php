<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Actualizar Integrante</title>
</head>

<?php
require_once('crud_integrantes.php');
require_once('integrante.php');
$crud = new CrudIntegrante();
$integrante = new Integrante();

$integrante = $crud->obtenerIntegrante($_GET['id_integrante']);
?>

<body class="d-flex flex-column min-vh-100">
<header>
		<h1 class="color-texto mt-5 ml-5">
    MODIFICAR INTEGRANTE
		</h1>
		<div class="row ml-3 mr-3">
			<div class="col">
				<a href="../index.php" class="btn btn-outline-light btn-sm links col-xs-12 col-md-3">Volver a inicio</a>
			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="row mt-4 justify-content-around">
			<div class="col-md-8 col-xs-12 ml-2 mr-2">
				<form action='administrar_integrante.php' method='post' class="fondo-form">
					<div class="form-group row form-group-nospace">
						<input type='hidden' name='id_integrante' value='<?php echo $integrante->getId() ?>'>
						<label for="nombre" class="col-12 col-form-label label-blanca">Nombre</label>
						<div class="col-12">
							<input class="form-input" id="nombre" type='text' name='nombre' value='<?php echo $integrante->getNombre() ?>'  required>
						</div>
					</div>
					<div class="form-group row form-group-nospace">
						<label for="apellido" class="col-12 col-form-label label-blanca">Apellido</label>
						<div class="col-12">
							<input class="form-input" id="apellido" type='text' name='apellido' value='<?php echo $integrante->getApellido() ?>'  required>
						</div>
					</div>
					<div class="form-group row form-group-nospace">
						<label for="mail" class="col-12 col-form-label label-blanca">Mail</label>
						<div class="col-12">
							<input class="form-input" id="mail" type='email' name='mail' value='<?php echo $integrante->getMail() ?>'  required>
						</div>
					</div>

					<div class="row text-center">
						<div class="col mt-3">
							<input type='hidden' name='actualizar' value='actualizar'>
							<input type='submit' value='Guardar' class="btn btn-outline-secondary btn-sm">
							<a href="ver_integrantes.php" class="btn btn-outline-danger btn-sm">Cancelar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	<footer class="pt-3 pl-3">
    Maceira Alvarez - 2020
  </footer>
</body>

</html>