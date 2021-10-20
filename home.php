<?php
require_once 'clases/usuario/Usuario.php';
require_once 'clases/campeonLol/RepositorioCampeon.php';
require_once 'clases/campeonLol/Campeon.php';

session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
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
    <br>
    <div class="text-center">
        <h3>Hola, <?php echo $nomApe; ?></h3>
        <br>
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-info text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
        }
        ?>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Línea</th>
                <th>Tipo</th>
                <th>Puntuación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php
            if (count($campeones) == 0) {
                echo "<tr><td colspan='7'>No hay campeones creados</td></tr>";
            } else {
                foreach ($campeones as $unCampeon) {
                    $id = $unCampeon->getId();
                    echo '<tr>';
                    echo "<td>$id</td>";
                    echo "<td id='nombre-$id'>" . $unCampeon->getNombreCampeon() . "</td>";
                    echo "<td id='linea-$id'>" . $unCampeon->getLineaCampeon() . "</td>";
                    echo "<td id='tipo-$id'>" . $unCampeon->getTipoCampeon() . "</td>";
                    echo "<td id='calificacion-$id'>" . $unCampeon->getCalificacion() . "</td>";
                    echo "<td><button type='button' onclick='editar($id)' class='btn btn-outline'>
                    <img src='assets/pencil-square.svg' class='btn-icon icon-edit'></button></td>";
                    echo "<td><a href='eliminar.php?id=$id' class='btn'><img src='assets/trash.svg' class='btn-icon icon-trash'></a></td>";
                    echo '</tr>';
                }
            }
            ?>
        </table>

        <br><br>
        <div class="btn-container">
            <a class="btn main-btn" href="campeonForm.php" role="button">Añadir nuevo campeón</a>
            <a class="btn main-btn" href="#" role="button">Ver estadísticas</a>
        </div>
        <br><br>

        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>
</body>

</html>