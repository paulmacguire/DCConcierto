<?php include('../templates/header.html');   ?>

<body>

<?php 
    require("../config/conexion.php");

    $nombre_artista = $_POST["nombre_artista"];

    $query = "SELECT evento, recinto, fecha_inicio, productora FROM eventos WHERE lower(artista) = lower('$nombre_artista') ORDER BY to_date(fecha_inicio, 'DD-MM-YYYY') DESC LIMIT 1";

    $result = $db -> prepare($query); #Se prepara la consulta
	$result -> execute(); #Se ejecuta la consulta
	$dataCollected = $result -> fetchAll(); #Se obtienen los resultados de la consulta

?>
<br>
<table class="table w-75", align="center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Evento</th>
            <th scope="col">Recinto</th>
            <th scope="col">Fecha</th>
            <th scope="col">Productora</th>
        </tr>
    </thead>

    <tr>
        <?php
            foreach ($dataCollected as $p) {
                echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";
        }
        ?>    
    </tr>
    
</table>

<?php include('../templates/footer.html'); ?>