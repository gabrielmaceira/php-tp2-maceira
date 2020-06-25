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
	<title>Ver Integrantes</title>
</head>

<?php
require_once('crud_integrantes.php');
require_once('integrante.php');
$crud = new CrudIntegrante();
$integrante = new Integrante();

$listaIntegrantes = $crud->mostrar();
?>

<body class="d-flex flex-column min-vh-100">
	<header>
		<h1 class="color-texto mt-5 ml-5">
			VER INTEGRANTES
		</h1>
		<div class="row ml-3 mr-3">
			<div class="col">
				<a href="../index.php" class="col-xs-12 col-md-3 btn btn-outline-light btn-sm links">Volver a Inicio</a>
        <a href="../estado/ver_estados.php" class="col-xs-12 col-md-3 btn btn-outline-light btn-sm links">Administrar Estados</a>
			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="row mt-4 justify-content-between">
			<a class="col-xs-12 col-md-5 mb-4 tarjeta-integrante ml-4 mr-4 link-agregar" href="crear_integrante.php">
				<div class="col-12 text-center">
					<span class="signo-mas">&#43;</span>
				</div>
				<div class="col-12 text-center">
					<span>Agregar integrante</span>
				</div>
			</a>
			<?php foreach ($listaIntegrantes as $integrante) { ?>
				<div class="col-xs-12 col-md-5 mb-4 tarjeta-integrante ml-4 mr-4">
					<div class="col-12 numero-integrante">
						<?php
							$nombreapellido = $integrante->getNombre() . " " . $integrante->getApellido();
							echo $nombreapellido;
							?>
					</div>
					<div class="col-12">
						<?php

						?>
					</div>
					<div class="col-12 italic">
						<?php echo $integrante->getMail() ?>
					</div>
					<div class="col-12 mt-4 text-center">
						<a class="btn btn-outline-secondary btn-sm" href="actualizar_integrante.php?id_integrante=<?php echo $integrante->getId() ?>&accion=a">Actualizar</a>
						<a class="btn btn-outline-danger btn-sm" href="administrar_integrante.php?id_integrante=<?php echo $integrante->getId() ?>&accion=e">Eliminar</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<footer class="pt-3 pl-3">
		Maceira Alvarez - 2020
	</footer>
</body>

</html>