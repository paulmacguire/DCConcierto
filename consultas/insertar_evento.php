<?php
	ob_start();
	session_start();
?>

<?php
    if (isset($_POST['post']) && !empty($_POST['productora']) && !empty($_POST['nombre_evento']) && !empty($_POST['recinto']) && !empty($_POST['artista']) && !empty($_POST['fecha_inicio']) && !empty($_POST['hospedaje']) && !empty($_POST['entradas']))
    {   
        require("../config/conexion.php");
        $nombre_evento = $_POST['nombre_evento'];
        $recinto = $_POST['recinto'];
        $artista = $_POST['artista'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $productora = $_POST['productora'];
        $hospedaje = $_POST['hospedaje'];
        $tour = $_POST['tour'];
        $entradas = $_POST['entradas'];
        
        if ($tour == "tour"){
            $query = "INSERT INTO eventos_propuestos(nombre_evento, recinto, artista, fecha_inicio, productora, hospedaje, tour, entradas) VALUES ('$nombre_evento', '$recinto', '$artista', '$fecha_inicio', '$productora', '$hospedaje', '-', '$entradas')";
        }
        else {
            $query = "INSERT INTO eventos_propuestos(nombre_evento, recinto, artista, fecha_inicio, productora, hospedaje, tour, entradas) VALUES ('$nombre_evento', '$recinto', '$artista', '$fecha_inicio', '$productora', '$hospedaje', '$tour', '$entradas')";
        }
        
        $result = $db1 -> prepare($query);
        $result -> execute();
        header("Location: ../index.php?");
    }
?>