<?php
require_once 'clases/campeonLol/RepositorioCampeon.php';

session_start();

if (isset($_SESSION['usuario']) && isset($_GET['id'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $repoCampeon = new RepositorioCampeon();
    $campeon = $repoCampeon->getOne($_GET['id']);
    if ($campeon->getIdUsuario() != $usuario->getId()) {
        die("Error: el campeón no pertenece al usuario.");
    }
    if ($repoCampeon->delete($campeon)) {
        $mensaje = "Campeón eliminado con éxito";
    } else {
        $mensaje = "Error al eliminar el campeón";
    }
    header('Location: home.php?mensaje=$mensaje');
} else {
    header('Location: index.php');
}
