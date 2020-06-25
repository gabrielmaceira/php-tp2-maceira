<?php
class Tarea
{
	private $id_tarea;
	private $fecha_tarea;
	private $desc_tarea;
	private $duracion_tarea;
	private $estado;
	private $integrante;
	private $observaciones;
	private $estado_texto;
	private $integrante_texto;
	private $fecha_fin;

	function __construct()
	{
	}

	public function getId()
	{
		return $this->id_tarea;
	}

	public function setId($id_tarea)
	{
		$this->id_tarea = $id_tarea;
	}

	public function getFecha()
	{
		return $this->fecha_tarea;
	}

	public function setFecha($fecha_tarea)
	{
		$this->fecha_tarea = $fecha_tarea;
	}

	public function getDescripcion()
	{
		return $this->desc_tarea;
	}

	public function setDescripcion($desc_tarea)
	{
		$this->desc_tarea = $desc_tarea;
	}

	public function getDuracion()
	{
		return $this->duracion_tarea;
	}

	public function setDuracion($duracion_tarea)
	{
		$this->duracion_tarea = $duracion_tarea;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	public function getIntegrante()
	{
		return $this->integrante;
	}

	public function setIntegrante($integrante)
	{
		$this->integrante = $integrante;
	}

	public function getObservaciones()
	{
		return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
		$this->observaciones = $observaciones;
	}

	public function getIntegranteTexto()
	{
		return $this->integrante_texto;
	}

	public function setIntegranteTexto($integrante_texto)
	{
		$this->integrante_texto = $integrante_texto;
	}

	public function getEstadoTexto()
	{
		return $this->estado_texto;
	}

	public function setEstadoTexto($estado_texto)
	{
		$this->estado_texto = $estado_texto;
	}
	
	public function getFechaFin()
	{
		return $this->fecha_fin;
	}

	public function setFechaFin($fecha_fin)
	{
		$this->fecha_fin = $fecha_fin;
	}
}
