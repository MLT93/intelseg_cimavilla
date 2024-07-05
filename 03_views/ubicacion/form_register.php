<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>REGISTRAR</title>
</head>

<body>

  <?php
  // var_dump($ubicaciones);
  /* 
    nombre
    latitud
    longitud
    pais
    ciudad
  */
  ?>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/ubicacion/store/" method="post" target="_self">

    <label for="nombreUbicacionID">NOMBRE UBICACIÓN</label>
    <input type="text" name="nombreUbicacion" id="nombreUbicacionID">

    <label for="longitudID">LONGITUD (N, S)</label>
    <input type="number" name="longitud" id="longitudID" step="0.0001" maxlength="7" required> <!-- `step="0.0001"` permite escribir más decimales -->

    <label for="latitudID">LATITUD (E, W)</label>
    <input type="number" name="latitud" id="latitudID" step="0.0001" maxlength="7" required> <!-- `step="0.0001"` permite escribir más decimales -->

    <label for="paisID">PAÍS</label>
    <input type="text" name="pais" id="paisID" required>

    <label for="ciudadID">CIUDAD</label>
    <input type="text" name="ciudad" id="ciudadID" required>

    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <br />
  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/ubicacion/list/">VE A LA LISTA</a></button>

</body>

</html>
