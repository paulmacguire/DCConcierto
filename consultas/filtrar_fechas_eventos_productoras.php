<?php
	ob_start();
	session_start();
?>


<?php include('../templates/header.html'); ?>



<?php 

    require("../config/conexion.php");
    $fecha_1 = $_POST['fecha_inicio'];
    $fecha_2 = $_POST['fecha_termino'];
    $nombre = $_SESSION['username'];

    $query1 = "SELECT * FROM eventos_propuestos 
    WHERE REPLACE(LOWER(eventos_propuestos.productora), ' ', '_') = '$nombre'
    AND eventos_propuestos.estado_evento = 'Pendiente'
    AND eventos_propuestos.fecha_inicio >= '$fecha_1' and eventos_propuestos.fecha_inicio <= '$fecha_2'
    ORDER BY eventos_propuestos.fecha_inicio ASC;";

    $query2 = "SELECT * FROM eventos_propuestos 
    WHERE REPLACE(LOWER(eventos_propuestos.productora), ' ', '_') = '$nombre' 
    AND eventos_propuestos.estado_evento = 'Aceptado'
    AND eventos_propuestos.fecha_inicio >= '$fecha_1' and eventos_propuestos.fecha_inicio <= '$fecha_2'
    ORDER BY eventos_propuestos.fecha_inicio ASC;";

    $query3 = "SELECT * FROM eventos_propuestos 
    WHERE REPLACE(LOWER(eventos_propuestos.productora), ' ', '_') = '$nombre' 
    AND eventos_propuestos.estado_evento = 'Rechazado'
    AND eventos_propuestos.fecha_inicio >= '$fecha_1' and eventos_propuestos.fecha_inicio <= '$fecha_2'
    ORDER BY eventos_propuestos.fecha_inicio ASC;";


    $result1 = $db1 -> prepare($query1);
    $result1 -> execute();
    $data1 = $result1 -> fetchAll();

    $result2 = $db1 -> prepare($query2);
    $result2 -> execute();
    $data2 = $result2 -> fetchAll();

    $result3 = $db1 -> prepare($query3);
    $result3 -> execute();
    $data3 = $result3 -> fetchAll();
            

?>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id=mainNav>
<div class="container">
  <a class="navbar-brand" href="../index.php"><img src="../assets/cloud.ico" alt="..." width="50" height="50"/></a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
    <i class="fas fa-bars ms-1"></i>
    </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
    
    <?php if (!isset($_SESSION['username'])) { ?>
      <li class="nav-item">  
        <a class="nav-link active" aria-current="page" href="views/login.php" style="color:whitesmoke;">Iniciar Sesión</a>
      </li>
      <?php } else {?>
        <li class="nav-item">  
          <a class="nav-link" style="color:whitesmoke; font-weight: bold">
            <?php echo $_SESSION['username'] ?>
          </a>
        </li>
        <li class="nav-item">  
        <a class="nav-link active" aria-current="page" href="../views/logout.php" style="color:whitesmoke;">Cerrar Sesión</a>
      </li>
      <?php } ?> 
    </ul>
  </div>
</div>
</nav>

<br></br>



<!-- Primera tabla -->
<?php if (!empty($data1)) {?>
  <div class="container text-center">
    <h2> ¡Aquí puedes ver tus eventos pendientes!</h2>
      <div class="col align-self-center">
          <table class="table table-striped">
              <thead>
                  <tr>
                  <th class="th-sm">Nombre del evento
                  </th>
                  <th class="th-sm">Recinto
                  </th>
                  <th class="th-sm">Fecha de inicio
                  </th>
                  <th class="th-sm">Artista
                  </th>
                  <th class="th-sm">Estado
                  </th>
                  </tr>
              </thead>
              <tbody>
              <tr>
              
              <?php foreach ($data1 as $d){ ?>
                <td><?php echo $d[1]; ?></td>
                <td><?php echo $d[2]; ?></td>
                <td><?php echo $d[4]; ?></td>
                <td><?php echo $d[3]; ?></td>
                <td><?php echo $d[6]; ?></td>
                </tr>
              <?php } ?>                         
              </tbody>
          </table>
      </div>
  </div>
<?php } ?>

<?php if (empty($data1)) {?>

<h1 align="center">¡Lo sentimos! No tiene eventos pendientes entre esas fechas...</h1>

<?php } ?>

<br><br>
<!-- Segunda tabla -->
<?php if (!empty($data2)) {?>
  <div class="container text-center">
  <h2> ¡Aquí puedes ver tus eventos aceptados!</h2>
      <div class="col align-self-center">
          <table class="table table-striped">
              <thead>
                  <tr>
                  <th class="th-sm">Nombre del evento
                  </th>
                  <th class="th-sm">Recinto
                  </th>
                  <th class="th-sm">Fecha de inicio
                  </th>
                  <th class="th-sm">Artista
                  </th>
                  <th class="th-sm">Estado
                  </th>
                  </tr>
              </thead>
              <tbody>
              <tr>
              
              <?php foreach ($data2 as $d2){ ?>
                <td><?php echo $d2[1]; ?></td>
                <td><?php echo $d2[2]; ?></td>
                <td><?php echo $d2[4]; ?></td>
                <td><?php echo $d2[3]; ?></td>
                <td><?php echo $d2[6]; ?></td>
                </tr>
              <?php } ?>                         
              </tbody>
          </table>
      </div>
  </div>
<?php } ?>

<?php if (empty($data2)) {?>

<h1 align="center">¡Lo sentimos! No tiene eventos aceptados entre esas fechas...</h1>

<?php } ?>
<br><br>
<!-- Tercera tabla -->
<?php if (!empty($data3)) {?>
  <div class="container text-center">
  <h2> ¡Aquí puedes ver tus eventos rechazados!</h2>
      <div class="col align-self-center">
          <table class="table table-striped">
              <thead>
                  <tr>
                  <th class="th-sm">Nombre del evento
                  </th>
                  <th class="th-sm">Recinto
                  </th>
                  <th class="th-sm">Fecha de inicio
                  </th>
                  <th class="th-sm">Artista
                  </th>
                  <th class="th-sm">Estado
                  </th>
                  </tr>
              </thead>
              <tbody>
              <tr>
              
              <?php foreach ($data3 as $d3){ ?>
                <td><?php echo $d3[1]; ?></td>
                <td><?php echo $d3[2]; ?></td>
                <td><?php echo $d3[4]; ?></td>
                <td><?php echo $d3[3]; ?></td>
                <td><?php echo $d3[6]; ?></td>
                </tr>
              <?php } ?>                         
              </tbody>
          </table>
      </div>
  </div>
<?php } ?>

<?php if (empty($data3)) {?>

<h1 align="center">¡Lo sentimos! No tiene eventos rechazados entre esas fechas...</h1>

<?php } ?>

<br><br>
<div class="container text-center">
    <a class="btn btn-primary btn-dark" href="../views/mostrar_eventos_productoras.php" role="button">Volver a los eventos sin filtrar </a>
</div>
<br><br>

<footer class="bg-dark text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: white">
    <h3>IIC2413</h3>
    <h5>Bases de datos</h5>
    <p>Pontificia Universidad Católica de Chile</p>
    Hecho por:
    <i class="fab fa-github"></i>
    <a class="text-dark" href="https://github.com/astugol">Diego Astudillo</a>
    <i class="fab fa-github"></i>
    <a class="text-dark" href="https://github.com/juanfdezg">Juan Fernández,</a>
    <i class="fab fa-github"></i>
    <a class="text-dark" href="https://github.com/paulmacguire">Paul Mac Guire,</a>
    <a>y</a> 
    <i class="fab fa-github"></i>
    <a class="text-dark" href="https://github.com/nicolasgarciaes">Nicolás García</a>
  </div>
  <!-- Copyright -->
</footer>