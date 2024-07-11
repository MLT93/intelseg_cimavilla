<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>LISTA</title>
</head>

<body>

  <?php
  // var_dump($lists);
  /* 
    ??
  */
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>ALERTA</th>
      <th>UBICACIÓN</th>
      <th>CIUDAD</th>
      <th>PAÍS</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($lists as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['tipo_alerta'] . "</td>";
      echo "<td>" . $value['nombreUbicacion'] . "</td>";
      echo "<td>" . $value['ciudad'] . "</td>";
      echo "<td>" . $value['pais'] . "</td>";
      // echo "<td><a href='/intelseg_cimavilla/detail?id=" . $value['alertaID'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/intelseg_cimavilla/detail/" . $value['alertaID'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/intelseg_cimavilla/register/">REGISTRAR</a></button>

</body>

</html>
