<?php
require_once 'clases/campeonLol/RepositorioCampeon.php';
require_once 'clases/usuario/Usuario.php';

session_start();

if (isset($_SESSION['usuario']) && isset($_POST['calificacion'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $repoCampeon = new RepositorioCampeon();
    $campeon = $repoCampeon->getOne($_POST['id']);
    if ($campeon->getIdUsuario() != $usuario->getId()) {
        die("Error: el campeón no pertenece al usuario.");
    }

    $r = $campeon->setCalificacion($_POST['calificacion']);

    if ($r) {
        $repoCampeon->editar($campeon);
        $respuesta['resultado'] = "OK";
    } else {
        $respuesta['resultado'] = "Error al editar campeón";
    }

    $respuesta['id_campeon'] = $campeon->getId();
    $respuesta['calificacion'] = $_POST['calificacion'];
    echo json_encode($respuesta);
} else {
    header('Location: index.php');
}
