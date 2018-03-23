<?php
require '../Modelo/conexion.php';
$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);

 ?>

<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vetex</title>

    <link rel="stylesheet" href="../css/foundation.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
  <!--header-->
  <header>
      <div class="top-bar">
          <div class="top-bar-left">

              <a href="../index.html">
                  <img id="logo" src="../img/logo.png" >
                 </a>

          </div>
          <div class="top-bar-right">
              <ul class="menu">

                  <li><a class="button"  href="contactanos.html">Contáctanos</a></li>
                  <li><a  class="button" href="SobreNosotros.html">Sobre nosotros</a></li>
                  <li><a  class="button" href="../index.html">Cerrar sesión</a></li>

              </ul>

                 <p class="menu-text" >Telefono 089 989 78</p>


          </div>
      </div>
      <br/>
  </header>


  <main class="row columns">
    <!--Información sobre la página-->

   <div class="row column text-center">
       <h1>Veterinaria Vetex</h1>
       <p class="lead">Veterinaria Urgencias Atención 24 Horas.</p>
       <ul class="orbit-container">

       </ul>
   </div>



   <div class="column row">
       <hr>
       <ul class="tabs" data-tabs id="example-tabs">
           <li class="tabs-title is-active"><a href="registrarUsuarios.html" aria-selected="true"><strong>Registrar</strong> </a></li>
           <li class="tabs-title is-active"><a href="listarUsuarios.php" aria-selected="true"><strong>Listar Usuarios</strong> </a></li>
       </ul>


   </div>
<!--Listar-->
<table class="scroll">
  <thead>
    <tr class="table table-striped table-hover">
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Mail</th>
      <th>Contraseña</th>
      <th>Especialidad</th>
      <th>Rol</th>

    </tr>
  </thead>
  <tbody>
    <?php
    while ($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
    ?>
    <tr>


    <td><?php echo $row[1] ?></td>
    <td><?php echo $row[2] ?></td>
    <td><?php echo $row[3] ?></td>
    <td><?php echo $row[4] ?></td>
    <td><?php echo $row[5] ?></td>
    <td><?php if($row[6] == 1){echo "Administrador";}else{echo "Veterinario";} ?></td>
    <td><a href="edit.php?id=<?php echo $row[0];  ?>" >Editar</a>
      <a href="eliminar.php?id=<?php echo $row[0];  ?>">Eliminar</a>
    </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  </main>
  <!--Footer-->
  <footer class="callout large secondary">
      <div class="row">
          <div class="large-4 columns">
  <!--Mapa-->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3328.69565045503!2d-70.7110606843516!3d-33.45723498077203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDI3JzI2LjEiUyA3MMKwNDInMzEuOSJX!5e0!3m2!1ses!2ses!4v1491965122439" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>


  <!--Nosotros-->
              </div>
          <div class="large-3 large-offset-2 columns">
              <ul class="menu vertical">
                  <li>www.vetex.cl</li>
                  <li>Dirección</li>
                  <li>Teléfono : XXXXXXX</li>
                  <li>Mail : contacto@vetex.cl</li>

              </ul>
          </div>
          <div class="large-3 columns">
              <ul class="menu vertical">
                  <li><a href="#">Sobre nosotros</a></li>
                  <li><a href="#">Términos y condiciones</a></li>
                  <li><a href="#">Contáctanos</a></li>

                  <!--Redes sociales-->
                  <div class="caja-redes">
                    <li><a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a></li>
                    <li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
                    <li><a href="#" class="icon-button pinterest"><i class="icon-pinterest"></i><span></span></a></li>
                  </div>
              </ul>
          </div>

      </div>
      <div class="medium-6 columns">
        <ul class="menu copy ">
        <li class="menu-text-">Copyright © 2017 </li>
        </ul>
      </div>


  </footer>
  <!--Scripts-->
  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script>
      $(document).foundation();
  </script>

</body>
</html>
