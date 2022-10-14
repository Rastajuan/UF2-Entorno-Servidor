<!DOCTYPE html>

<?php

session_start();

if (isset($_POST['botonEntrar'])) {
    if ($_POST['usuario'] == 'ifp'  && $_POST['password'] == '2021') {
        $nombreusuario = $_POST['usuario'];
        $_SESSION['usuario'] = $nombreusuario;

        header('Location: index.php');
        exit();
    } else {
        $error = '<div class = "contError"><img class = "icon" src = "imgs/Error.png"/></br>Usuario o contraseña incorrectos</div>';
    }
}

?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Usuarios</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <div class="header" style="width: 55%;">
        <header>
            <h1>ACCESO A CREACI&Oacute;N DE ACTIVIDADES</h1>
        </header>
    </div>

    <div class="logIn" id="cont">
        <div class="formLogin">
            <fieldset>
                <legend class="negrita">Enter username and password</legend>
                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="">
                    <table class="tbLog">
                        <tr>
                            <td>
                                <input class="sinBorde" type="text" name="usuario" placeholder="Username" autofocus </td>

                        </tr>
                        <tr>
                            <td><input class="sinBorde" type="password" name="password" placeholder="****" />
                            </td>

                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                    </table>
                    <input class="botonLog" type="submit" value="Entrar" name="botonEntrar" />
                </form>

            </fieldset>
        </div>
        <!-- Imprimimos la variable del error de login solamente si existe el error definido en el else inicial-->
        <?php
        if (isset($error)) {

            echo $error;
        }
        ?>
    </div>

    <div class=" footer" id="foot">
        <footer>
            <p>©Copyleft 2022 <strong>Juan Bello Fern&aacute;ndez</strong> </br> Trabajo perteneciente a la UF2 de Diseño Web en Entorno Servidor. 2º DAW</p>

            </p>

        </footer>
    </div>

</body>

</html>