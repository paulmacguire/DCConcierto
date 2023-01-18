<?php include('../templates/header.html');   ?>

<body>

<?php 
    require("../config/conexion.php");

    $nombre_artista = $_POST["nombre_artista"];

    $query = "SELECT COUNT(*) FROM entradas WHERE lower(artista) = lower('$nombre_artista')";

    $result = $db -> prepare($query); #Se prepara la consulta
	$result -> execute(); #Se ejecuta la consulta
	$dataCollected = $result -> fetchAll(); #Se obtienen los resultados de la consulta

?>
<br>
<table class="table w-75", align="center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Número de entradas cortesía</th>
        </tr>
    </thead>

    <tr>
        <?php
            foreach ($dataCollected as $p) {
                echo "<tr><td>$nombre_artista</td><td>$p[0]</td></tr>";
        }
        ?>
    </tr>
</table>

<?php include('../templates/footer.html'); ?>