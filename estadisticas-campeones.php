<?php
require_once 'clases/usuario/Usuario.php';
require_once 'clases/campeonLol/RepositorioCampeon.php';
require_once 'clases/campeonLol/Campeon.php';

session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $repoCampeon = new RepositorioCampeon();
    $campeones = $repoCampeon->getAll($usuario);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="container">
    <div class="text-center page-title">
        <h1>Sistema de ranking de campeones</h1>
    </div>
    <br><br>
    <h4 class="section-title">Estadísticas de líneas</h4>
    <?php
    $lineas = array_column($campeones, 'lineaCampeon');
    $cantidadLineas = array_count_values($lineas);
    arsort($cantidadLineas);
    $masElegido = array_key_first($cantidadLineas);
    $menosElegido = array_key_last($cantidadLineas);

    echo "<ul class='list-group list-group-flush'>";
    echo "<li class='list-group-item'>Línea más jugada: " . $masElegido . "</li>";
    echo "<li class='list-group-item'>Línea menos jugada: " . $menosElegido . "</li>";
    echo "</ul>";
    ?>
    <br>
    <div class="btn-container">
        <a class="btn main-btn" href="home.php" role="button">Volver</a>
    </div>
</body>

</html>