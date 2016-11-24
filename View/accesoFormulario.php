<html>
  <head>
    <meta charset="UTF-8">
    <title>Proyecto PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../View/css/estilo.css"/>
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap Script -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <h2 style="text-align: center; margin-top: 200px;">Login </h2>
    <div id="accesoFormulario">
    <?php 
    if ($codigoError == "accesoDenegado") {
      echo '<h4>Error durante la autentificacion, el nombre o el usuario no es correcto.</h4>';
    }

    ?>
      <form action="../Controller/accesoAccion.php" method="post">
        <ul>
          <li class="flex-item">
            <i class="icon-user"></i><input type="text" name="nombre" placeholder="Usuario.." autofocus="autofocus" required="required">
          </li>
          <li class="flex-item">
            <i class="icon-pass"></i><input type="password" name="clave" placeholder="Contraseña.." required="required">
          </li>
          <li class="flex-item">
            <input type="submit" value="Entrar">
          </li>
        </ul>
      </form>
    </div>
  </body>
</html>
