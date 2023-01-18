<?php include('../templates/header.html'); ?>

    <?php
        require("../config/conexion.php");
        $query = "SELECT nombre, contrasena, tipo_usuario FROM usuarios;";
        $result = $db1 -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
    ?>



<div class="container text-center">
    <div class="col align-self-center">
        <table class="table table-striped">
            <thead>
                <tr>
                <th class="th-sm">Nombre
                </th>
                <th class="th-sm">Contraseña
                </th>
                <th class="th-sm">Tipo usuario
                </th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        foreach (array_slice($data, 201) as $p) {
                            echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="../mostrar_usuarios.php">1</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios3.php">3</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios4.php">4</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios5.php">5</a></li>
        </ul>
    </nav>
</div>