<?php
   
    function returnTipo($username, $passwordd) {
        require("../config/conexion.php");

        $query = "SELECT tipo_usuario, CAST(contrasena as text) FROM usuarios WHERE nombre = '$username' LIMIT 1;";
        $result = $db1 -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
        // Verificar si funciona esto
        $tipo_usuario = $data[0]['tipo_usuario'];
        $contrasena = $data[0]['contrasena'];

        if ($contrasena == $passwordd) {
            return $tipo_usuario;
        } else {
            return [];
        }
    }

?>