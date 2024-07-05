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
  // var_dump($detail);
  /* 
    medicionesID
    nombreFenomeno
    latitud
    longitud
    pais
    ciudad
  */
  ?>

  <h1>DETALLE</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>LATITUD</th>
      <th>LONGITUD</th>
      <th>PAÍS</th>
      <th>CIUDAD</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['medicionesID'] . "</td>";
    echo "<td>" . $detail[0]['nombreFenomeno'] . "</td>";
    echo "<td>" . $detail[0]['latitud'] . "</td>";
    echo "<td>" . $detail[0]['longitud'] . "</td>";
    echo "<td>" . $detail[0]['pais'] . "</td>";
    echo "<td>" . $detail[0]['ciudad'] . "</td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/medicion/list/">VUELVE ATRÁS</a></button>

</body>

</html>
