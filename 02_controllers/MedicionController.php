<?php

// Importación de archivos
require_once("01_models/Ubicacion.php");
require_once("01_models/Fenomeno.php");
require_once("01_models/Medicion.php");

class MedicionController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $model = new Medicion(); // Instancia donde se realiza la conexión a la DB
    $mediciones = $model->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/medicion/list.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $model = new Ubicacion(); // Instancia donde se realiza la conexión a la DB
    $ubicaciones = $model->getAll(); // Obtengo la información de la DB y la envío a la View `form_register.php`

    $model = new Fenomeno(); // Instancia donde se realiza la conexión a la DB
    $fenomenos = $model->getAll(); // Obtengo la información de la DB y la envío a la View `form_register.php`

    require "03_views/medicion/form_register.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {

      $ubicacion = intval($_POST['ubicacion']);
      $fechaHora = $_POST['fechaHora'];
      $temperatura = floatval($_POST['temperatura']);
      $humedad = floatval($_POST['humedad']);
      $presion = floatval($_POST['presion']);
      $velocidadViento = floatval($_POST['velocidadViento']);
      $direccionViento = $_POST['direccionViento'];
      $precipitacion = floatval($_POST['precipitacion']);
      $fenomeno = intval($_POST['fenomeno']);

      $model = new Medicion();
      $model->add($ubicacion, "$fechaHora", $temperatura, $humedad, $presion, $velocidadViento, "$direccionViento", $precipitacion, $fenomeno);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/medicion/list/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $model = new Medicion(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/medicion/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $model = new Medicion(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/medicion/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
