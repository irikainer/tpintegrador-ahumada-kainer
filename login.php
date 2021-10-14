<?php
require_once 'clases/usuario/ControladorSesion.php';

if (!isset($_POST['usuario']) || !isset($_POST['clave'])) {
    $redirigir = 'index.html?mensaje=Error: Falta un campo obligatorio';
} else {
    $cs = new ControladorSesion();
    $login = $cs->login($_POST['usuario'], $_POST['clave']);
    if ($login[0] === true) {
        $redirigir = 'home.html';
    } else {
        $redirigir = 'index.php?mensaje=' . $login[1];
    }
}
header('Location: ' . $redirigir);
