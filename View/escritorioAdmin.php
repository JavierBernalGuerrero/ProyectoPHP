<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Listado Usuarios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../View/css/estilo.css"/>
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap Script -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div id="escritorioAdministrador">
      <h3>Escritorio de administrador</h3>
      <h5>Estas conectado como <?= $_SESSION['usuario'] ?></h5>
      <h6><a href="../Controller/cerrarSesion.php">Cerrar Sesion</a></h6>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Administrador</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <form action="../Controller/insertarAccion.php" method="post">
              <td>
                <input type="text" name="idUsuario" placeholder="ID..." required="required" autofocus="autofocus">
              </td>
              <td>
                <input type="text" name="nombre" placeholder="Nombre..." required="required">
              </td>
              <td>
                <input type="text" name="clave" placeholder="Contraseña..." required="required">
              </td>
              <td>
                <input type="checkbox" name="permisoAdmin" value="true">
              </td>
              <td colspan="2">
                <button class="btn waves-effect waves-light" type="submit">
                  <i class="material-icons">add</i>
                </button>
              </td>
            </form>
          </tr>
        </tfoot>
        <tbody>
      <?php
        foreach($data['usuarios'] as $usuario) {
      ?>
        <tr>
          <td><?= $usuario->getIdUsuario() ?></td>
          <td><?= $usuario->getNombre() ?></td>
          <td><?= $usuario->getClave() ?></td>
          <td>
            <?php 
            if ($usuario->getAdministrador()) {
              echo '<input type="checkbox" name="permisoAdmin" value="true" disabled="disabled" checked="checked">';
              
            } else {
              echo '<input type="checkbox" name="permisoAdmin" value="false" disabled="disabled">';
              
            }
            ?>
          </td>
          <td></td>
          <td>
            <form action="../Controller/borrarAccion.php" method="post" >
              <input type="hidden" name="idUsuario" value="<?= $usuario->getIdUsuario() ?>">
              <input type="submit" value="Borrar">
            </form>
          </td>
        </tr>
      <?php
        }
      ?>
        </tbody>
      </table>
    </div>
  </body>
</html>