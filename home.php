<?php
require_once 'clases/usuario/Usuario.php';
session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
} else {
    header('Location: index.html');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Sistema de ranking de campeones</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="container">
    <div class="jumbotron text-center">
        <h1>Sistema de ranking de campeones</h1>
    </div>
    <div class="text-center">
        <h3>Hola <?php echo $nomApe; ?></h3>
        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>
</body>

</html>