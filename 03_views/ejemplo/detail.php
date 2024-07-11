<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>DETALLE</title>
</head>

<body>

  <?php
  // var_dump($details);
  /* 
    ??
  */
  ?>

  <h1>DETALLE</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>DESCRIPCIÓN</th>
      <th>FECHA DE INICIO</th>
      <th>FECHA DE FIN</th>
      <th>LATITUD</th>
      <th>LONGITUD</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $details[0]['alertaID'] . "</td>";
    echo "<td>" . $details[0]['descripcion'] . "</td>";
    echo "<td>" . $details[0]['fecha_inicio'] . "</td>";
    echo "<td>" . $details[0]['fecha_fin'] . "</td>";
    echo "<td>" . $details[0]['latitud'] . "</td>";
    echo "<td>" . $details[0]['longitud'] . "</td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/intelseg_cimavilla/">VUELVE ATRÁS</a></button>

</body>

</html>
