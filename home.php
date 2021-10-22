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
                    echo "<td>" . $unCampeon->getNombreCampeon() . "</td>";
                    echo "<td id='linea-$id'>" . $unCampeon->getLineaCampeon() . "</td>";
                    echo "<td>" . $unCampeon->getTipoCampeon() . "</td>";
                    echo "<td id='calificacion-$id'>" . $unCampeon->getCalificacion() . "</td>";
                    echo "<td><button type='button' onclick='mostrar($id)' class='btn btn-outline'>
                    <img src='assets/pencil-square.svg' class='btn-icon icon-edit'></button></td>";
                    echo "<td><a href='eliminar.php?id=$id' class='btn'><img src='assets/trash.svg' class='btn-icon icon-trash'></a></td>";
                    echo '</tr>';
                }
            }
            ?>
        </table>
        <br>

        <div id="editar-campeon">
            <h5>Cambiar calificación</h5>
            <input type="hidden" id="id">
            <input id="calificacion" type="number" class="form-control" placeholder="Calificación del 1 a 10"><br>
            <div class="btn-container">
                <button type="button" class="btn main-btn" onclick='editar()'>Guardar</button>
            </div>
            <br>
        </div>

        <br>
        <div class="btn-container">
            <a class="btn main-btn" href="campeonForm.php" role="button">Añadir nuevo campeón</a>
            <a class="btn main-btn" href="estadisticas-campeones.php" role="button">Ver estadísticas</a>
        </div>
        <br>

        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>

    <script>
        function mostrar($id) {
            var x = document.getElementById("editar-campeon");
            x.style.display = "block";
            document.querySelector('#id').value = $id;
        }

        function editar() {
            var id = document.querySelector('#id').value;
            var calificacion = document.querySelector('#calificacion').value;

            var cadena = "id=" + id + "&calificacion=" + calificacion;

            var solicitud = new XMLHttpRequest();

            solicitud.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var respuesta = JSON.parse(this.responseText);
                    var identificadorCalificacion = "#calificacion-" + respuesta.id_campeon;
                    var celdaCalificacion = document.querySelector(identificadorCalificacion);

                    if (respuesta.resultado == "OK") {
                        celdaCalificacion.innerHTML = respuesta.calificacion;
                    } else {
                        alert(respuesta.resultado);
                    }

                    celdaCalificacion.scrollIntoView();

                    var x = document.getElementById("editar-campeon");
                    x.style.display = "none";
                    var inputCalificacion = document.getElementById("calificacion");
                    inputCalificacion.value = '';
                }
            }
            solicitud.open("POST", "editarCampeon.php", true);
            solicitud.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            solicitud.send(cadena);
        }
    </script>
</body>

</html>