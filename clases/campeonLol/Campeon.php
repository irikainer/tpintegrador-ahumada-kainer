<?php
require_once 'clases/usuario/Usuario.php';

class Campeon
{
    protected $idCampeon;
    protected $calificacion;
    protected $nombreCampeon;
    protected $lineaCampeon;
    protected $tipoCampeon;
    protected $usuario;

    public function __construct($nombre, $linea, $id = null, $calificacion, $tipo, Usuario $usuario)
    {
        $this->calificacion = $calificacion;
        $this->idCampeon = $id;
        $this->nombreCampeon = $nombre;
        $this->lineaCampeon = $linea;
        $this->tipoCampeon = $tipo;
        $this->usuario = $usuario;
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
        return $this->usuario->getId();
    }
    
}
