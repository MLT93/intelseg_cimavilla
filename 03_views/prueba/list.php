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
  // var_dump($alertas);
  /* 
    alertaID
    tipo_alerta
    descripcion
    fecha_inicio
    fecha_fin
    ubicacionID
    nombreUbicacion
    latitud
    longitud
    pais
    ciudad
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
    foreach ($alertas as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['tipo_alerta'] . "</td>";
      echo "<td>" . $value['nombreUbicacion'] . "</td>";
      echo "<td>" . $value['ciudad'] . "</td>";
      echo "<td>" . $value['pais'] . "</td>";
      // echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/alerta/detail?id=" . $value['alertaID'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/alerta/detail/" . $value['alertaID'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/alerta/register/">REGISTRAR</a></button>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/ubicacion/register/">AÑADE UNA UBICACIÓN</a></button>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/medicion/register/">AÑADE UNA MEDICIÓN</a></button>

</body>

</html>
