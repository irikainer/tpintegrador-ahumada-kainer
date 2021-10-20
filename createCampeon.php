<?php
require_once 'clases/usuario/Usuario.php';
require_once 'clases/campeonLol/Campeon.php';
require_once 'clases/campeonLol/RepositorioCampeon.php';


session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    //se crea el campeon
    $campeon = new Campeon($_POST['nombreCampeon'], $_POST['lineaCampeon'], null, $_POST['calificacion'], $_POST['tipoCampeon'], $usuario);
    $repoCampeon = new RepositorioCampeon();
    $idCampeon = $repoCampeon->create($campeon);
    if ($idCampeon === false) {
        header('Location: home.php?mensaje=Error al crear campeón');
    } else {
        $campeon->setId($idCampeon);
        header('Location: home.php?mensaje=Campeón creado con éxito');
    }
} else {
    header('Location: index.php');
}
