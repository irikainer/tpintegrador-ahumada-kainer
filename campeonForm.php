<?php

session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>¡Bienvenido/a!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="container">
    <div class="text-center page-title">
        <h1>Sistema de ranking de campeones</h1>
    </div>
    <br>
    <div class="text-center">
        <h3>Crear nuevo campeón</h3>
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
        }
        ?>
        <br>
        <form action="createCampeon.php" method="post">
            <input name="nombreCampeon" class="form-control" placeholder="Nombre de campeón"><br>
            <select class="form-select" name="lineaCampeon">
                <option selected>Elegir línea</option>
                <option value="Carril superior">Carril superior</option>
                <option value="Jungla">Jungla</option>
                <option value="Carril medio">Carril medio</option>
                <option value="Carril inferior">Carril inferior</option>
                <option value="Soporte">Soporte</option>
            </select><br>
            <select class="form-select" name="tipoCampeon">
                <option selected>Elegir tipo</option>
                <option value="Mago">Mago</option>
                <option value="Tirador">Tirador</option>
                <option value="Apoyo">Apoyo</option>
                <option value="Luchador">Luchador</option>
                <option value="Asesino">Asesino</option>
                <option value="Tanque">Tanque</option>
            </select><br>
            <input name="calificacion" type="number" class="form-control" placeholder="Calificación del 1 a 10"><br>
            <div class="btn-container">
                <input type="submit" value="Guardar" class="btn main-btn">
                <a class="btn main-btn" href="home.php" role="button">Volver</a>
            </div>
        </form>
    </div>
</body>

</html>