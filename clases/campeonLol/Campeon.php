<?php
require_once 'clases/usuario/Usuario.php';

class Campeon
{
    public $idCampeon;
    public $calificacion;
    public $nombreCampeon;
    public $lineaCampeon;
    public $tipoCampeon;
    public $idUsuario;

    public function __construct($nombre, $linea, $id = null, $calificacion, $tipo, $idUsuario)
    {
        $this->calificacion = $calificacion;
        $this->idCampeon = $id;
        $this->nombreCampeon = $nombre;
        $this->lineaCampeon = $linea;
        $this->tipoCampeon = $tipo;
        $this->idUsuario = $idUsuario;
    }

    public function setId($id)
    {
        $this->idCampeon = $id;
    }

    public function getId()
    {
        return $this->idCampeon;
    }

    public function getNombreCampeon()
    {
        return $this->nombreCampeon;
    }

    public function getCalificacion()
    {
        return $this->calificacion;
    }

    public function getLineaCampeon()
    {
        return $this->lineaCampeon;
    }

    public function getTipoCampeon()
    {
        return $this->tipoCampeon;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setCalificacion($nuevaCalificacion)
    {
        $this->calificacion = $nuevaCalificacion;
        return true;
    }
}
