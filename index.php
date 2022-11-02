<!-- Iniciamos la sesión con la función session_start();
Luego creamos un array
-->
<?php
session_start();
?>
<!DOCTYPE html>
<!-- Requerimos la carga del archivo donde hemos creado la clase php 'Acitvidad' -->
<?php
require "actividad.php";
?>

<!-- Si no tenemos la sesión iniciada pero existe la cookie de usuario asignamos a la $_SESSION["usuario"] el vlaor de la cookie con lo que se saltará el siguiente condicional pues ya existe sesión iniciada-->
<?php
if (!isset($_SESSION["usuario"]) && isset($_COOKIE["cookieDeUsuario"])) {
    $_SESSION["usuario"] = $_COOKIE["cookieDeUsuario"];
}
?>
<?php
/* Comprobación loguin usuario
Si no está iniciada la sesión con el usuario redirigimos a la página de logIn, no nos deja continuar con el resto de la web
 */
if (!isset($_SESSION["usuario"])) {
    header('Location: logIn_es.php');
    exit();
}
/* Con un condicional creamos el array únicamente si este no ha sido creado ya (no hemos iniciado sesión) o no hemos abandonado la web*/
if (!isset($_SESSION["actividades_creadas"])) {
    $_SESSION["actividades_creadas"] = array();
}

/* Cada vez que se crea un objeto e la clase Actividad mediante el botón enviar, incluiremos la nueva actividad en el array $_SESSION["actividades_creadas"] creado anteriormente el método array_push()
Como lo almacenamos para la sesión, debemos serializar el nuevo elemento del array con serialize()
Creamos una nueva variable $actividad_serializada solamente para mejorar la visualización del código, pero serviría igualemnte array_push($_SESSION["actividades_creadas"], serialize($actividad));*/
if (isset($_POST["botonEnviar"])) {
    $actividad = new Actividad(
        $_POST["titulo"],
        $_POST["tipo"],
        $_POST["fecha"],
        $_POST["ciudad"],
        $_POST["precio"]
    );

    $actividad_serializada = serialize($actividad);

    array_push($_SESSION["actividades_creadas"], $actividad_serializada);
}



?>

<!-- Si se ha enviado el formulario con el botón de nombre "botonEnviar" se creará un nuevo objeto de la clase Actividad ($actividad) mediante la función constructora, con los parñámetros enviados desde el formulario.
Con el método isset($_POST["botonEnviar"]) comprobamos que se ha enviado el formulario-->
<?php
if (isset($_POST["botonEnviar"])) {
    $actividad = new Actividad(
        $_POST["titulo"],
        $_POST["tipo"],
        $_POST["fecha"],
        $_POST["ciudad"],
        $_POST["precio"]
    );
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Actividades</title>
    <link rel="stylesheet" href="css/index_css.css">
</head>

<body>
    <header>
        <h1>FORMULARIO DE ACTIVIDADES</h1>
        <BR>
        <h2>RELLENE LOS CAMPOS PARA CREAR UNA NUEVA ACTIVIDAD</h2>
    </header>

    <div id="users">
        <nav class="users">
            <div>
                <p>Usuario actual:<spam> <?php echo $_SESSION["usuario"]; ?></spam>
                </p>
            </div>
            <div class="salir">
                <form>
                    <a href="logOut.php" name="logOut" title="Cierra sesión">Cerrar Sesión</a>
                </form>

            </div>
        </nav>
    </div>


    <!-- Incluimos el formulario desde un archivo externo 'formulario.html' con php -->
    <div id="formulario">
        <section class="datos">
            <?php include "formulario.html" ?>
        </section>

        <p class="info">Rellene el formulario para añadir actividades a su agenda<br><br>Recuerde que los campos marcados con (*) son obligatorios</p>


    </div>


    <!-- Mediante un foreach iteramos en el array y se lo asignamos a la variable $actividadSerializada
        A continuación, hay que deserializar el contenido, creamos otra variable (aunque puede hacerse foreach($_SESSION["actividades_creadas"] as unserialeze($actividadSerializada)) pero mejoramos la legibilidad del código) para deserializar y poder acceder al contenido del array -->

    <div id="resultados">
        <?php foreach ($_SESSION["actividades_creadas"] as $actividadSerializada) :
            $actividad = unserialize($actividadSerializada);
        ?>
            <!-- Incluimos el resultado desde un archivo externeo 'resultado.html' con php -->
            <?php include "resultado.php" ?>

        <?php endforeach; ?>


    </div>










    <footer>
        <p>©Copyleft 2022 <strong>Juan Bello Fernández</strong> </br> Trabajo perteneciente a la UF2 de Diseño Web en Entorno Servidor. 2º DAW</p>

        </p>

    </footer>



</body>

</html>