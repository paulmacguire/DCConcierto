<?php
	session_start();
?>

<?php 
    include('../templates/header.html');
    include('../config/data.php')
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


<section>
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-image: url('https://images.pexels.com/photos/1494665/pexels-photo-1494665.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="my-5 display-3 fw-bold ls-tight" style="color: white">
            Crea tus <br />
            <span class="text-primary">propios eventos</span>
          </h1>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
            <form action="../consultas/insertar_evento.php" method="post">
            <!-- Productora input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3"> Productora </label>
              <input name="productora" class="form-control" id="form3Example3" type="text" value="<?php echo $_SESSION['username'] ?>" readonly />
            </div>
            
            <!-- evento input -->
            <div class="form-outline mb-4">
                <?php
                    $sql = "select distinct evento from eventos order by evento";
                    $result = pg_query($con, $sql);
                ?>
                <table>
                <tr>
                  <label class="form-label" name=evento type="text" for="form3Example3"> Evento </label>
                    <td>
                      <select name ="nombre_evento" class="form-select" id="form3Example3">
                            <option value="nombre_evento" > Seleccione un evento </option>
                            <?php
                            while ($row = pg_fetch_assoc($result) ){
                            $name = $row['evento'];
                            echo "<option value='".$name."' >".$name."</option>";
                            }
                            ?>
                      </select>
                    </td>
                </tr>
                </table>
            </div> 

            <!-- Tour input -->
            <div class="form-outline mb-4">
                <?php
                    $sql = "select distinct nombre from tours order by nombre";
                    $result = pg_query($con, $sql);
                ?>
                <table>
                <tr>
                  <label class="form-label" name=tour type="text" for="form3Example3"> Tour (si es que es pertenece a uno) </label>
                    <td>
                      <select name ="tour" class="form-select" id="form3Example3">
                            <option value="tour" > Seleccione un tour </option>
                            <?php
                            while ($row = pg_fetch_assoc($result) ){
                            $name = $row['nombre'];
                            echo "<option value='".$name."' >".$name."</option>";
                            }
                            ?>
                      </select>
                    </td>
                </tr>
                </table>
            </div> 


            <!-- Recinto input -->   
            <div class="form-outline mb-4">
                <?php
                    $sql = "select * from recintos_ciudad order by recinto";
                    $result = pg_query($con, $sql);
                ?>
                <table>
                <tr>
                  <label class="form-label" name=recinto type="text" for="form3Example3">Recinto</label>
                    <td>
                      <select name ="recinto" class="form-select" id="form3Example3">
                            <option value="recinto" > Seleccione un recinto </option>
                            <?php
                            while ($row = pg_fetch_assoc($result) ){
                            $name = $row['recinto'];
                            echo "<option value='".$name."' >".$name."</option>";
                            }
                            ?>
                      </select>
                    </td>
                </tr>
                </table>
            </div>         
            
            <!-- Artista input -->
            <div class="form-outline mb-4">
                <?php
                    $sql = "select * from artistas order by nombre_artistico";
                    $result = pg_query($con, $sql);
                ?>
                <table>
                <tr>
                  <label class="form-label" name=artista type="text" for="form3Example3">Artista</label>
                    <td>
                      <select name ="artista" class="form-select" id="form3Example3">
                            <option value="artista" > Seleccione un artista </option>
                            <?php
                            while ($row = pg_fetch_assoc($result) ){
                            $name = $row['nombre_artistico'];
                            echo "<option value='".$name."' >".$name."</option>";
                            }
                            ?>
                      </select>
                    </td>
                </tr>
                </table>
            </div>

            <!-- Fecha_inicio input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Fecha de realización</label>
              <input name="fecha_inicio" type="date" id="form3Example3" class="form-control" placeholder="Ej: 20/07/2022" required autofocus/>
            </div>

            <!-- Hospedaje input -->
            <div class="form-outline mb-4">
                <?php
                    $sql = "select distinct nombre_hotel from hospedajes_traslado order by nombre_hotel ";
                    $result = pg_query($con, $sql);
                ?>
                <table>
                <tr>
                  <label class="form-label" name=hospedaje type="text" for="form3Example3">Hospedaje</label>
                    <td>
                      <select name ="hospedaje" class="form-select" id="form3Example3">
                            <option value="hospedaje" > Seleccione un hospedaje </option>
                            <?php
                            while ($row = pg_fetch_assoc($result) ){
                            $name = $row['nombre_hotel'];
                            echo "<option value='".$name."' >".$name."</option>";
                            }
                            ?>
                      </select>
                    </td>
                </tr>
                </table>
            </div>

            <!-- Entradas input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Número de entradas de cortesía</label>
              <input name="entradas" type="number"  min="0" id="form3Example3" class="form-control" placeholder="Ej: 3" required autofocus/>
            </div>


            <!-- Submit button -->
            <button name="post" type="submit" class="btn btn-primary btn-block btn-dark mb-4">
              Crear evento
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


<footer class="bg-dark text-center text-lg-start">
  <div class="text-center p-3 " style="background-color: white ">
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
</footer>
