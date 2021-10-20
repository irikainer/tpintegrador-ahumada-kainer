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
        <div class="login-box">
            <h3>Login de usuario</h3>
            <br>
            <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-info text-center">
                    <p class="alert-message">' . $_GET['mensaje'] . '</p></div>';
            }
            ?>


            <form action="login.php" method="post">
                <input name="usuario" class="form-control" placeholder="Nombre de usuario"><br>
                <input name="clave" type="password" class="form-control" placeholder="Contraseña"><br>
                <input type="submit" value="Ingresar" class="btn main-btn">
            </form><br>
            <p><a href="create.php">Registrarse</a></p>
        </div>
    </div>
</body>

</html>