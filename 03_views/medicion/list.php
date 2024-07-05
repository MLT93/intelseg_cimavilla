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
  // var_dump($mediciones);
  /* 
    id
    nombreFenomeno
    latitud
    longitud
    pais
    ciudad
  */
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>NOMBRE</th>
      <th>LATITUD</th>
      <th>LONGITUD</th>
      <th>PAÍS</th>
      <th>CIUDAD</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($mediciones as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['nombreFenomeno'] . "</td>";
      echo "<td>" . $value['latitud'] . "</td>";
      echo "<td>" . $value['longitud'] . "</td>";
      echo "<td>" . $value['pais'] . "</td>";
      echo "<td>" . $value['ciudad'] . "</td>";
      // echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/medicion/detail?id=" . $value['medicionesID'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/medicion/detail/" . $value['medicionesID'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/medicion/register/">VUELVE ATRÁS</a></button>

</body>

</html>
