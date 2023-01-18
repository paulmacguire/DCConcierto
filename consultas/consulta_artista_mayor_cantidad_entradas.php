<?php include('../templates/header.html');   ?>

<body>

<?php 
    require("../config/conexion.php");

    $query = "WITH cantidades_maximas as (WITH cantidad_entradas AS (SELECT artista_entrada.id_artista, COUNT(artista_entrada.id_entrada) AS cantidad_maxima FROM artista_entrada GROUP BY artista_entrada.id_artista ORDER BY COUNT(id_entrada) DESC LIMIT 1) SELECT artista_entrada.id_artista as id_artista, COUNT(artista_entrada.id_entrada) FROM artista_entrada, cantidad_entradas GROUP BY artista_entrada.id_artista, cantidad_entradas.cantidad_maxima HAVING COUNT(artista_entrada.id_entrada) = cantidad_entradas.cantidad_maxima) SELECT artistas.nombre_artistico, cantidades_maximas.COUNT FROM cantidades_maximas, artistas WHERE cantidades_maximas.id_artista = artistas.id_artista ORDER BY artistas.nombre_artistico";

    $result = $db -> prepare($query); #Se prepara la consulta
	$result -> execute(); #Se ejecuta la consulta
	$dataCollected = $result -> fetchAll(); #Se obtienen los resultados de la consulta

?>
<br>
<table class="table w-75", align="center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad de entradas</th>
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