<?php

// Importación de archivos
require_once("01_models/Home.php");

class HomeController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function index() {
    require "03_views/home/home.php";
  }

//   public function list()
//   {
//     /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
//     $model = new Home(); // Instancia donde se realiza la conexión a la DB
//     $Homes = $model->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

//     require "03_views/home/list.php";
//   }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA USAR LA INFO EN LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $model = new Home(); // Instancia donde se realiza la conexión a la DB
    $ubicaciones = $model->getAll(); // Obtengo la información de la DB y la envío a la View `register_user.php`

    require "03_views/home/register_user.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {

      $ubicacion_id = $_POST['ubicacion'];
      $tipo_Home = $_POST['tipoHome'];
      $descripcion = $_POST['descripcion'];
      $fecha_inicio = $_POST['fechaInicio'];
      $fecha_fin = $_POST['fechaFin'];

      // Al tener en la DB una función que por defecto toma la fecha de registro, este input se utilizará si la fecha de inicio es distinta a la actual
      if (empty($fecha_inicio)) {
        $fecha_inicio = date("Y-m-d H:i:s", intval(strtotime("now")));
      }

      // var_dump($fecha_inicio);

      $model = new Home();
      $model->add($ubicacion_id, "$tipo_Home", "$descripcion", "$fecha_inicio", "$fecha_fin");

      header("Location: /intelseg_cimavilla/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $model = new Home(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/home/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $model = new Home(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/home/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
