    <?php 

        function eventosPendientes($username){
            require("config/conexion.php");
            $query = "SELECT * FROM eventos WHERE eventos.estado == 'Pendiente' AND eventos.artista == $username";
            $result = $db -> prepare($query);
            $result -> execute();

            $data = $result -> fetchAll();
            return displayeventosPendientes($data);
        }

        function displayeventosPendientes($data) { ?>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0"> 
                    <thread>
                        <tr>
                            <th> modificar estado </th>
                            <th> codigo vuelo </th>
                            <th> fecha salida </th>
                            <th> fecha llegada </th>
                            <th> aerodromo salida </th>
                            <th> ciudad salida </th>
                            <th> aerodromo llegada </th>
                            <th> ciudad llegada</th>
                            <th> codigo aeronave </th>
                            <th> codigo compania </th>
                            <th> fecha propuesta </th>
                        </tr>
                    </thread>
                </table>
            </div>
        <?php }

    ?>

    