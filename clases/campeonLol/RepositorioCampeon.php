<?php
require_once 'clase/repostorio.php';
require_once 'Campeon.php';

class RepositorioCampeon extends Repositorio
{
    private static $conexion = null;

    public function __construct()
    {
        self::$conexion = parent::__construct();
    }
}