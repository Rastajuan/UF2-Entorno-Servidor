<!DOCTYPE html>
<!-- REQUERIMOS LA CARGA DEL ARCHIVO DONDE TENEMOS CREADA LA CLASE PHP 'ACTIVIDAD' -->
<?php require "actividad.php"; ?>

<!-- SI SE HA ENVIADO EL FORMULARIO MEDIANTE EL BOTON "botonEnviar" SE CREARA UN OBJETO DE CLASE ACTIVIDAD ($actividad) MEDIANTE LA FUNCION CONSTRUCTORA CON LOS PARAMETROS ENVIADOS POR EL FORMULARIO
        PUEDE HACERSE DE DOS MANERAS, MEDIANTE EL METODO ISSET COMPROBANDO QUE E HA PULSADO EL BOTON O SI SE HA ENVIADO EL FORMULARIO MEDIANTE LE METODO POST. EN EL EJEMPLO SE USAN LAS DOS MANERAS CON UN OR(||) PERO CON UNA ES SUFICIENTE-->
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Actividades</title>
    <link rel="stylesheet" href="estilos.css">
    <!-- <link rel="stylesheet" href="estilos2.css"> -->
</head>

<body>
    <div class="header">
        <header>
            <h1>FORMULARIO DE ACTIVIDADES</h1>
        </header>
    </div>

    <div class="container" id="cont">
        <!-- Incluimos el formulario desde un archivo externeo 'formulario.html' con php -->
        <div class="formulario" id="form">
            <section>
                <?php include "formulario.html" ?>
            </section>
        </div>

        <!-- MEDIANTE UN IF MOSTRAREMOS O NO EL CONTENEDOR DE LA ACTIVIDAD. SI SE HA CREADO EL OBJETO $actividad, SE MOSTRARÁ, SI NO NO APARECERÁ EN PANTALLA 
        LOS DOS PUNTOS (:) DESPUES DE LA CONDICION DEL IF INDICA QUE EL IF QUEDA ABIERTO Y QUE LO QUE ESTÁ DESPUÉS OCURRIRÁ SOLO SI SE CUMPLE LA CONDICION DEL IF-->
        <?php if (isset($actividad)) : ?>



            <div class="resultados" id="result">
                <!-- Incluimos el resultado desde un archivo externeo 'resultado.html' con php -->
                <?php include "resultado.html" ?>
            </div>

        <?php endif; ?>

    </div>
    <div class=" footer" id="foot">
        <footer>
            <p>©Copyleft 2022 <strong>Juan Bello Fernández</strong> </br> Trabajo perteneciente a la UF1 de Diseño Web en Entorno Servidor. 2º DAW</p>

            </p>

        </footer>
    </div>


</body>

</html>