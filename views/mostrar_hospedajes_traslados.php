<?php session_start();
    
?>


<?php include('../templates/header.html'); ?>

    <?php
        require("../config/conexion.php");
        $nombre = $_SESSION['username'];
        $query = "SELECT * FROM hospedajes_traslado WHERE REPLACE(LOWER(artista), ' ', '_') = '$nombre';";
        $result = $db1 -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
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

<?php if (!empty($data)) {?>
  <div class="container text-center">
  <h2> ¡Aquí puedes ver tus hospedajes y traslados!</h2><br>
      <div class="col align-self-center">
          <table class="table table-striped">
              <thead>
                  <tr>
                  <th class="th-sm">Código de la reserva
                  </th>
                  <th class="th-sm">Fecha de inicio
                  </th>
                  <th class="th-sm">Fecha de término
                  </th>
                  <th class="th-sm">Nombre del hotel
                  </th>
                  <th class="th-sm">Tipo de traslado
                  </th>
                  </tr>
              </thead>
              <tbody>
              <tr>
              
              <?php foreach ($data as $d){ ?>        
                <td><?php echo $d[0]; ?></td>
                <td><?php echo $d[2]; ?></td>
                <td><?php echo $d[3]; ?></td>
                <td><?php echo $d[4]; ?></td>
                <td><?php echo $d[5]; ?></td>
                </form>
                </tr>
              <?php } ?>                         
              </tbody>
          </table>
      </div>
  </div>
<?php } ?>


<?php if (empty($data)) {?>

<h1 align="center">¡Lo sentimos! No tiene historial de hospedajes ni traslados...</h1>

<?php } ?>

<br>
<div class="container text-center">
    <a class="btn btn-primary btn-dark" href="../index.php" role="button">Volver a la página de inicio </a>
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