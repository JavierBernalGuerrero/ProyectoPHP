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
    <h3>Escritorio de <?= $_SESSION['usuario'] ?></h3>
      <h6><a href="../Controller/cerrarSesion.php">Cerrar Sesion</a></h6>
    <div id="escritorioUsuario">
      
    </div>
  </body>
</html>
