<?php include('../templates/header.html');   ?>

<body>

<?php 
    require("../config/conexion.php");

    $nombre_artista = $_POST["nombre_artista"];

    $query = "SELECT nombre_hotel, COUNT(nombre_hotel) as cantidad_de_veces_hospedado FROM hospedajes_traslado WHERE lower(artista) = lower('$nombre_artista') GROUP BY nombre_hotel";

    $result = $db -> prepare($query); #Se prepara la consulta
	$result -> execute(); #Se ejecuta la consulta
	$dataCollected = $result -> fetchAll(); #Se obtienen los resultados de la consulta

?>
<br>
<table class="table w-75", align="center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Hotel</th>
            <th scope="col">Cantidad de veces hospedado</th>
        </tr>

    </thead>

    <tr>
        <?php
            foreach ($dataCollected as $p) {
                echo "<tr><td>$nombre_artista</td><td>$p[0]</td><td>$p[1]</td></tr>";
        }
        ?>
    </tr>

</table>

<?php include('../templates/footer.html'); ?>