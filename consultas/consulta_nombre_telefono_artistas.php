<?php include('../templates/header.html');   ?>

<body>

<?php 
    require("../config/conexion.php");

    $query = "SELECT nombre_artistico, numero_contacto FROM artistas ORDER BY nombre_artistico";

    $result = $db -> prepare($query); #Se prepara la consulta
	$result -> execute(); #Se ejecuta la consulta
	$dataCollected = $result -> fetchAll(); #Se obtienen los resultados de la consulta

?>
<br>
<table class="table w-75", align="center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Número de contacto</th>
        </tr>   
    </thead>
    
    <tr>
        
    <?php

        foreach ($dataCollected as $p) {
            echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
    }
    ?>   
    </tr>
    
</table>


<?php include('../templates/footer.html'); ?>