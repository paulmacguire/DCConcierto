<?php session_start();
    
?>


<?php 
  include('templates/header.html');
  require('consultas/consulta_tipo_usuario.php');
/* Poner los includes y requires necesarios ACÁ.......$_ENV */

?>


<!-- Logica principal -->

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id=mainNav>
<div class="container">
  <a class="navbar-brand" href="index.php"><img src="assets/cloud.ico" alt="..." width="50" height="50"/></a>
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
        <a class="nav-link active" aria-current="page" href="views/logout.php" style="color:whitesmoke;">Cerrar Sesión</a>
        </li>
      <?php } ?> 
    </ul>
  </div>
</div>
</nav>

<!-- Navigation-->

<!-- Header-->

<?php if (!isset($_SESSION['username'])) {?>
  <header class="masthead d-flex align-items-center">
      <div class="container px-4 px-lg-5 text-center">
          <h1 class="mb-1" style="color:black;">¿Eres un aficionado de la música?</h1>
          <h3 class="mb-5" style="color:black;"><em>Esta es la página para ti</em></h3>
          <a class="btn btn-dark btn-xl" href="#about">¡Empecemos!</a>
      </div>
  </header>
<!-- About-->
  <section class="callout1" id ="about">
      <div class="container px-4 px-lg-5  text-center">
          <h1 class="mx-auto mb-5" style="color:black;">
          ¡Nuestra página cuenta con un sistema para crear usuarios!
          </h1>
          <form align="center" action="consultas/importar_usuarios.php" method="post">
              <br>
              <br>
              <input type="submit" value="Importar usuarios" class="btn btn-dark btn-xl">
          </form>
          
      </div>
  </section>

  <section class="callout6" id ="about">
      <div class="container px-4 px-lg-5 text-center">
          <h1 class="mx-auto mb-5" style="color:black;">
          También puedes ver los nombres de los usuarios y sus contraseñas!
          </h1>
          <form align="center" action="consultas/mostrar_usuarios.php" method="post">
              <br>
              <br>
              <input type="submit" value="Ver usuarios" class="btn btn-dark btn-xl">
          </form>
          
      </div>
  </section>
<?php } ?>



<?php if (isset($_SESSION['username'])) {?>
  <?php if ($_SESSION['tipo'] == 'Artista') {?>
    <!-- Mostrar eventos pendientes  -->
    <section class="callout3" id ="about">
      <div class="container px-4 px-lg-5 text-center">
          <h1 class="mx-auto mb-5" style="color:black;">
          ¡Puedes revisar tus eventos pendientes!
          </h1>
          <form align="center" action="views/mostrar_eventos.php" method="post">
              <br>
              <br>
              <input type="submit" value="Revisar eventos pendientes" class="btn btn-dark btn-xl">
          </form>
          
      </div>
    </section>
    
    <section class="callout2" id ="about">
      <div class="container px-4 px-lg-5 text-center">
          <h1 class="mx-auto mb-5" style="color:white;">
          ¡Puedes revisar tus eventos aceptados!
          </h1>
          <form align="center" action="views/mostrar_eventos_aceptados.php" method="post">
              <br>
              <br>
              <input type="submit" value="Revisar eventos aceptados" class="btn btn-dark btn-xl">
          </form>
      </div>
    </section>
    
    <section class="callout4" id ="about">
      <div class="container px-4 px-lg-5 text-center">
          <h1 class="mx-auto mb-5" style="color:white;">
          ¡Puedes revisar tus eventos rechazados!
          </h1>
          <form align="center" action="views/mostrar_eventos_rechazados.php" method="post">
              <br>
              <br>
              <input type="submit" value="Revisar eventos rechazados" class="btn btn-dark btn-xl">
          </form>
      </div>
    </section>

    <section class="callout6" id ="about">
      <div class="container px-4 px-lg-5 text-center">
          <h1 class="mx-auto mb-5" style="color:black;">
          ¡Puedes revisar tus hospedajes y traslados!
          </h1>
          <form align="center" action="views/mostrar_hospedajes_traslados.php" method="post">
              <br>
              <br>
              <input type="submit" value="Revisar hospedajes y traslados" class="btn btn-dark btn-xl">
          </form>
      </div>
    </section>
  <?php } ?>
<?php } ?>


<?php if (isset($_SESSION['username'])) {?>
  <?php if ($_SESSION['tipo'] == 'Productora') {?>
    <section class="callout4" id ="about">
      <div class="container px-4 px-lg-5 text-center">
          <h1 class="mx-auto mb-5" style="color:white;">
          Hola productor <?php echo $_SESSION['username'] ?>!
          </h1>
          <form align="center" action="views/mostrar_eventos_productoras.php" method="post">
              <br>
              <br>
              <input type="submit" value="Ver eventos" class="btn btn-dark btn-xl">
          </form>
          
      </div>
    </section>

    <section class="callout3" id ="about">
      <div class="container px-4 px-lg-5 text-center">
          <h1 class="mx-auto mb-5" style="color:black;">
          ¡Puedes crear tus propios eventos!
          </h1>
          <form align="center" action="views/crear_evento.php" method="post">
              <br>
              <br>
              <input type="submit" value="Crear evento" class="btn btn-dark btn-xl">
          </form>
          
      </div>
  </section>
  <?php } ?>
<?php } ?>

</body>

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
</html>