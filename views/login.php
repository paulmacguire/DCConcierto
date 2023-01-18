<?php
	session_start();
?>

<?php include('../templates/header.html'); ?>


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
    
    <?php if (!isset($_SESSION['username'])) ?>  
    <li class="nav-item">  
        <a class="nav-link active" aria-current="page" href="../views/login.php" style="color:whitesmoke;">Iniciar Sesión</a>
      </li>
    </ul>
  </div>
</div>
</nav>


<br/><br/>


<section>
<div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-image: url('https://cdn.uc.assets.prezly.com/c261d70f-2548-48f2-93ef-ad1507b19c32/-/preview/1200x1200/-/format/auto/')">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight" style="color: white">
             DCConciertos<br />
            <span class="text-primary" style="color: white"> La mejor página para artistas y productoras</span>
          </h1>
          <p style="color: white">
            <b>Artista:</b> Podrás ver los eventos que tienes programados junto con los eventos que necesitan tu aprobación.
          </p>
          <p style="color: white">
          <b>Productora:</b> Podrás ver tus eventos programados, filtrar por fechas y crear propuestas de eventos para los artistas.
          </p>           
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
            <form action="login_validation.php" method="post">
            <!-- Name input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Nombre</label>
              <input name="username" type="text" id="form3Example3" class="form-control" placeholder="EJ: dcc_producciones" required autofocus/>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Password</label>
              <input name="password" type="password" id="form3Example4" class="form-control" required/>
            </div>
            <!-- Submit button -->
            <button type="submit" name="login" class="btn btn-primary btn-block btn-dark mb-4">
              Iniciar Sesión
            </button>
            <br/><br/>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<footer class="bg-dark text-center text-lg-start fixed-bottom ">
  <div class="text-center p-3 " style="background-color: white">
    <h3>IIC2413</h3>
    <h5>Bases de datos</h5>
    <p>Pontificia Universidad Católica de Chile</p>
    Hecho por:
    <i class="fab fa-github"></i>
    <a class="text-dark" href="https://github.com/astugol">Diego Astudillo</a>
    <i class="fab fa-github"></i>
    <a class="text-dark" href="https://github.com/juanfdezg">Juan Fernández,</a>
    <i class="fab fa-github"></i>
    <a class="text-dark" href="https://github.com/paulmacguire">Paul Mac-Guire,</a>
    <a>y</a> 
    <i class="fab fa-github"></i>
    <a class="text-dark" href="https://github.com/nicolasgarciaes">Nicolás García</a>
  </div>
</footer>


