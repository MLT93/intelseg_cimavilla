<?php

// Importación de archivos
require_once("01_models/Alerta.php");
require_once("01_models/Medicion.php");
require_once("01_models/Ubicacion.php");

class UbicacionController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $model = new Ubicacion(); // Instancia donde se realiza la conexión a la DB
    $ubicaciones = $model->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/ubicacion/list.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $model = new Ubicacion(); // Instancia donde se realiza la conexión a la DB
    $ubicaciones = $model->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/ubicacion/form_register.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {

      $nombre = $_POST['nombreUbicacion'];
      $latitud = floatval($_POST['latitud']);
      $longitud = floatval($_POST['longitud']);
      $pais = $_POST['pais'];
      $ciudad = $_POST['ciudad'];

      $model = new Ubicacion();
      $model->add("$nombre", "$latitud", "$longitud", "$pais", "$ciudad");

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/metereologia/ubicacion/list/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $model = new Ubicacion(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/ubicacion/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $model = new Ubicacion(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/ubicacion/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
