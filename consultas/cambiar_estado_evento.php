<?php
	ob_start();
	session_start();
?>

<?php 

    if (isset($_POST['accion']) && !empty($_POST['id_evento']))
    {   
        require("../config/conexion.php");
        $id_evento = $_POST["id_evento"];
        $accion = $_POST['accion'];
        if ($accion == "Aceptar") {
            $query = "UPDATE eventos_propuestos SET estado_evento='Aceptado' WHERE id_evento_propuesto = '$id_evento'";
        }
        if ($accion == "Rechazar") {
            $query = "UPDATE eventos_propuestos SET estado_evento='Rechazado' WHERE id_evento_propuesto = '$id_evento'";
        }
        $result = $db1 -> prepare($query);
        $result -> execute();
        header("Location: ../views/mostrar_eventos.php");        
    }


?>