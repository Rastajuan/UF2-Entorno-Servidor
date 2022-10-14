<?php 
//hay que iniciar siempre sesión para poder cerrarla
session_start();

//Con esto cancelamos o cerramos la sesión
session_destroy();

echo 'sesion finalizada';

//Redirigimos a la pagina de logIN.php
header('Location: index.php');
exit();

?>