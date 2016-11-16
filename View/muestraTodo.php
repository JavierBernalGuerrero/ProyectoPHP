<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Listado de ofertas</title>
  </head>
  <body>
    <h3>Todos los usuarios</h3>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Clave</th>
        <th>Modificar</th>
        <th>Eliminar</th>
      </tr>
    <?php
      foreach($data['usuarios'] as $usuario) {
    ?>
      <tr>
        <td><?=$usuario->getIdUsuario()?></td>
        <td><?=$usuario->getNombre()?></td>
        <td><?=$usuario->getClave()?></td>
        <td></td>
        <td></td>
      </tr>
    <?php
      }
    ?>
    </table>
  </body>
</html>