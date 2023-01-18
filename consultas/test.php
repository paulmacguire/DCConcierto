<?php 
    require("../config/conexion.php");

    $nombre_evento = $_POST["nombre_evento"];
    $valor = $_POST['accion'];
    header("Location: ../index.php?msg=$nombre_evento,$valor");

?>

<h1> $nombre_evento </h1>