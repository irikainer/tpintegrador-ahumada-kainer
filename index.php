<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>¡Bienvenido/a!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="container">
    <div class="jumbotron text-center">
        <h1>Sistema de ranking de campeones</h1>
    </div>
    <div class="text-center">
        <h3>Login de usuario</h3>

        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
        }
        ?>

        <form action="login.php" method="post">
            <input name="usuario" class="form-control form-control-lg" placeholder="Nombre de usuario"><br>
            <input name="clave" type="text" class="form-control form-control-lg" placeholder="Contraseña"><br>
            <input type="submit" value="Ingresar" class="btn btn-primary">
        </form><br>
        <p><a href="create.php">Registrarse</a></p>
    </div>
</body>

</html>