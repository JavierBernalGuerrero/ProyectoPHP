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
    <div id="accesoFormulario">
      <h2>Esto es el login</h2>
      <?php 
      if ($codigoError == "accesoDenegado") {
        echo '<h4>Error durante la autentificacion, el nombre o el usuario no es correcto.</h4>';
      }

      ?>
      <form action="../Controller/accesoAccion.php" method="post">
        <input type="text" name="nombre" placeholder="Usuario.." autofocus="autofocus" required="required">
        <input type="password" name="clave" placeholder="Contraseña.." required="required">
        <input type="submit" value="Entrar">
      </form>
    </div>
  </body>
</html>
