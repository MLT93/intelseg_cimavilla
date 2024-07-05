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
    echo "<td>" . $detail[0]['alertaID'] . "</td>";
    echo "<td>" . $detail[0]['descripcion'] . "</td>";
    echo "<td>" . $detail[0]['fecha_inicio'] . "</td>";
    echo "<td>" . $detail[0]['fecha_fin'] . "</td>";
    echo "<td>" . $detail[0]['latitud'] . "</td>";
    echo "<td>" . $detail[0]['longitud'] . "</td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/">VUELVE ATRÁS</a></button>

</body>

</html>
