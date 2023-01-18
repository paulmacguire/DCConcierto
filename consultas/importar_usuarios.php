<?php include('../templates/header.html'); ?>

    <?php
        require("../config/conexion.php");
        $query = "SELECT * FROM importar_usuarios();";
        $result = $db1 -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
    ?>

<?php include('../templates/footer.html') ?>

<p style="background: url(../assets/img/bg-callout.jpg)">

<style>
body {
  background-image: url('https://images.wallpaperscraft.com/image/single/concert_performance_smoke_136716_1920x1080.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<p style="background-image: url('https://images.wallpaperscraft.com/image/single/concert_performance_smoke_136716_1920x1080.jpg');">


<div class="text-center" style="color:white">
  <h1 class="display-3">Gracias!</h1>
  <p class="lead"><strong>Creaste todos los usuarios con sus respectivas contraseñas.</strong></p>
  <p> Ahora podrás iniciar sesión.</p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-dark" href="../index.php" role="button">Volver a la página de inicio </a>
  </p>
</div>