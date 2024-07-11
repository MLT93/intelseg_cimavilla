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
  // var_dump($registers);
  /* 
    ??
  */
  ?>

  <form action="/intelseg_cimavilla/store/" method="post" target="_self">

    <label for="ubicacionID">UBICACIÓN</label>
    <select name="ubicacion" id="ubicacionID" required>
      <option value="0">Elige una ubicación</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable que no se usa en el Controller
    */
      foreach ($registers as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="tipoAlertaID">TIPO ALERTA</label>
    <input type="text" name="tipoAlerta" id="tipoAlertaID" required>

    <label for="descripcionID">DESCRIPCIÓN</label>
    <textarea name="descripcion" id="descripcionID" required></textarea>

    <label for="fechaInicioID">FECHA DE INICIO (Distinta a la actual)</label> <!-- Al tener en la DB una función que por defecto toma la fecha de registro, este input se utilizará si la fecha de inicio es distinta a la actual -->
    <input type="datetime-local" name="fechaInicio" id="fechaInicioID">

    <label for="fechaFinID">FECHA DE FIN</label>
    <input type="datetime-local" name="fechaFin" id="fechaFinID" required>

    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <br />
  <button><a href="/intelseg_cimavilla/">VE A LA LISTA</a></button>

</body>

</html>
