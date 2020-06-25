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
	<title>Actualizar Tarea</title>
</head>

<?php
require_once('crud_tarea.php');
require_once('tarea.php');
$crud = new CrudTarea();
$tarea = new Tarea();

$tarea = $crud->obtenerTarea($_GET['id_tarea']);
?>

<?php
require_once('../estado/crud_estados.php');
require_once('../estado/estado.php');
$crud = new CrudEstado();
$estado = new Estado();

$listaEstados = $crud->mostrar();
?>

<?php
require_once('../integrante/crud_integrantes.php');
require_once('../integrante/integrante.php');
$crud = new CrudIntegrante();
$integrante = new Integrante();

$listaIntegrantes = $crud->mostrar();
?>

<body class="d-flex flex-column min-vh-100">
	<header>
		<h1 class="color-texto mt-5 ml-5">
		MODIFICAR TAREA
		</h1>
		<div class="row ml-3 mr-3">
			<div class="col">
				<a href="../index.php" class="btn btn-outline-light btn-sm links col-xs-12 col-md-3">Volver a inicio</a>
			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="row mt-4 ml-2 mr-2 justify-content-around">
			<div class="col-xs-12 col-md-8">
				<form action='administrar_tarea.php' method='post' class="fondo-form">
					<div class="form-group row form-group-nospace">
						<input type='hidden' name='id_tarea' value='<?php echo $tarea->getId() ?>'>
						<label for="desc_tarea" class="col-12 col-form-label label-blanca">Descripción</label>
						<div class="col-12">
							<input class="form-input" id="desc_tarea" type='text' name='desc_tarea' value='<?php echo $tarea->getDescripcion() ?>' required>
						</div>
					</div>
					<div class="form-group row form-group-nospace">
						<label for="fecha_tarea" class="col-12 col-form-label label-blanca">Fecha Inicio</label>
						<div class="col-12">
							<input class="form-input" id="fecha_tarea" type='date' name='fecha_tarea' value='<?php echo $tarea->getFecha() ?>' required>
						</div>
					</div>
					<div class="form-group row form-group-nospace">
						<label for="duracion_tarea" class="col-12 col-form-label label-blanca">Duracion (días)</label>
						<div class="col-12">
							<input class="form-input" id="duracion_tarea" type='number' name='duracion_tarea' value='<?php echo $tarea->getDuracion() ?>' required>
						</div>
					</div>
					<div class="form-group row form-group-nospace">
						<label for="duracion_tarea" class="col-12 col-form-label label-blanca">Integrante</label>
						<div class="col-12">
							<select class="dropdown" id="integrante" name="integrante">
								<?php if ($tarea->getIntegrante() !== null) { ?>
									<option value="0">No asignado</option>
								<?php } else { ?>
									<option selected value="0">No asignado</option>
								<?php } ?>
								<?php foreach ($listaIntegrantes as $integrante) { ?>
									<?php if ($tarea->getIntegrante() === $integrante->getId()) { ?>
										<option selected value="<?php echo $integrante->getId() ?>">
										<?php } else { ?>
										<option value="<?php echo $integrante->getId() ?>">
										<?php } ?>
										<?php
										$nombreapellido = $integrante->getNombre() . " " . $integrante->getApellido();
										echo $nombreapellido
										?>
										</option>
									<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row form-group-nospace">
						<label for="duracion_tarea" class="col-12 col-form-label label-blanca">Estado</label>
						<div class="col-12">
							<select class="dropdown" id="estado" name="estado">
								<?php if ($tarea->getEstado() == null) { ?>
									<option value="0">Sin estado</option>
								<?php } else { ?>
									<option selected value="0">Sin estado</option>
								<?php } ?>
								<?php foreach ($listaEstados as $estado) { ?>
									<?php if ($tarea->getEstado() === $estado->getId()) { ?>
										<option selected value="<?php echo $estado->getId() ?>">
										<?php } else { ?>
										<option value="<?php echo $estado->getId() ?>">
										<?php } ?>
										<?php
										echo $estado->getDescripcion();
										?>
										</option>
									<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row form-group-nospace">
						<label for="observaciones" class="col-12 col-form-label label-blanca">Observaciones</label>
						<div class="col-12">
							<input class="form-input" id="observaciones" type='text' name='observaciones' value='<?php echo $tarea->getObservaciones() ?>' required>
						</div>
					</div>

					<div class="row text-center">
						<div class="col mt-3">
							<input type='hidden' name='actualizar' value='actualizar'>
							<input type='submit' value='Guardar' class="btn btn-outline-secondary btn-sm">
							<a href="../index.php" class="btn btn-outline-danger btn-sm">Cancelar</a>
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