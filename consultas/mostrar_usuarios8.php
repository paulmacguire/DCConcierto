<?php include('../templates/header.html'); ?>

    <?php
        require("../config/conexion.php");
        $query = "SELECT nombre, contrasena, tipo_usuario FROM usuarios;";
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
      <a class="nav-link active" aria-current="page" href="../views/login.php" style="color:whitesmoke;">Iniciar Sesión</a>
      </li>
      <?php } else {?>
        <li class="nav-item">  
        <a class="nav-link active" aria-current="page" href="../views/logout.php" style="color:whitesmoke;">Cerrar Sesión</a>
      </li>
      <?php } ?> 
    </ul>
  </div>
</div>
</nav>

<br></br><br></br>

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
                        foreach (array_slice($data, 351, 400) as $p) {
                            echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>
    <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="mostrar_usuarios.php">1</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios3.php">3</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios4.php">4</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios5.php">5</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios6.php">6</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios7.php">7</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios8.php">8</a></li>
            <li class="page-item"><a class="page-link" href="mostrar_usuarios9.php">9</a></li>
        </ul>
    </nav>
</div>

<div class="container text-center">
    <a class="btn btn-primary btn-dark" href="../index.php" role="button">Volver a la página de inicio </a>
</div>

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