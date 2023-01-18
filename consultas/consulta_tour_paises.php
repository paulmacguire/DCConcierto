<?php include('../templates/header.html');   ?>

<body>

<?php 
    require("../config/conexion.php");

    $nombre_tour = $_POST["nombre_tour"];

    $query = "SELECT DISTINCT ciudades_pais.pais FROM recintos_ciudad, eventos, tours, ciudades_pais WHERE recintos_ciudad.recinto = eventos.recinto 
    AND eventos.evento = tours.nombre AND lower(tours.nombre) = lower('$nombre_tour') AND recintos_ciudad.ciudad = ciudades_pais.ciudad ORDER BY ciudades_pais.pais";


    $result = $db -> prepare($query); #Se prepara la consulta
	$result -> execute(); #Se ejecuta la consulta
	$dataCollected = $result -> fetchAll(); #Se obtienen los resultados de la consulta

?>
<br>
<table class="table w-75", align="center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Países</th>
        </tr>
    </thead>
    
    <tr>
        <?php
            foreach ($dataCollected as $p) {
                echo "<tr><td>$nombre_tour</td><td>$p[0]</td></tr>";
        }
        ?>
    </tr>
</table>

<?php include('../templates/footer.html'); ?>