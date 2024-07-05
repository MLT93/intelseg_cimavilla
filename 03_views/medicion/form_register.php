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
  // var_dump($fenomenos);
  /* 
    ubicacion_id
    fecha_hora
    temperatura
    humedad
    presion
    velocidad_viento
    direccion_viento
    precipitacion
    fenomeno_id
  */
  ?>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/medicion/store/" method="post" target="_self">

    <label for="nombreUbicacionID">NOMBRE UBICACIÓN</label>
    <select name="ubicacion" id="ubicacionID" required>
      <option value="0">Elige una ubicación</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable que no se usa en el Controller
    */
      foreach ($ubicaciones as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="fechaHoraID">FECHA y HORA</label>
    <input type="datetime-local" name="fechaHora" id="fechaHoraID" required>

    <label for="temperaturaID">TEMPERATURA</label>
    <input type="number" name="temperatura" id="temperaturaID" step="0.01" required> <!-- `step="0.01"` permite escribir más decimales -->

    <label for="humedadID">HUMEDAD</label>
    <input type="number" name="humedad" id="humedadID" step="0.01" required> <!-- `step="0.01"` permite escribir más decimales -->

    <label for="presionID">PRESIÓN</label>
    <input type="number" name="presion" id="presionID" step="0.01" required> <!-- `step="0.01"` permite escribir más decimales -->

    <label for="velocidadVientoID">VELOCIDAD DEL VIENTO</label>
    <input type="number" name="velocidadViento" id="velocidadVientoID" step="0.01" required> <!-- `step="0.01"` permite escribir más decimales -->

    <label for="direccionVientoID">DIRECCIÓN DEL VIENTO</label>
    <input type="text" name="direccionViento" id="direccionVientoID" step="0.01" required> <!-- `step="0.01"` permite escribir más decimales -->

    <label for="precipitacionID">PRECIPITACIÓN</label>
    <input type="number" name="precipitacion" id="precipitacionID" step="0.01" required> <!-- `step="0.01"` permite escribir más decimales -->

    <label for="fenomenoID">FENÓMENO ATMOSFÉRICO</label>
    <select name="fenomeno" id="fenomenoID" required>
      <option value="0">Elige un fenómeno</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable que no se usa en el Controller
    */
      foreach ($fenomenos as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>

    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <br />
  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/medicion/list/">VE A LA LISTA</a></button>

</body>

</html>
