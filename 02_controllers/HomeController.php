<?php

// Importación de archivos
require_once "01_models/Home.php";

class HomeController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function index()
  {
    require "03_views/home/home.php";
  }

  public function login()
  {
    /* AQUÍ OBTENGO LA INFO DE LOS USUARIOS DE MI DB*/
    $model = new Home(); // Instancia donde se realiza la conexión a la DB
    $users = $model->getAllUsers(); // Obtengo la información de la DB y la envío a la View `login.php`

    require "03_views/home/login.php";
  }

  //   public function list()
  //   {
  //     /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
  //     $model = new Home(); // Instancia donde se realiza la conexión a la DB
  //     $Homes = $model->getAll(); // Obtengo la información de la DB y la envío a la View `list.php`

  //     require "03_views/home/list.php";
  //   }

  // public function register() // Nos manda al formulario de registro
  // {
  //   /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA USAR LA INFO EN LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
  //   $model = new Home(); // Instancia donde se realiza la conexión a la DB
  //   $ubicaciones = $model->getAll(); // Obtengo la información de la DB y la envío a la View `register_user.php`

  //   require "03_views/home/register_user.php"; // Aquí estará disponible la variable sin utilizar
  // }

  public function checkUser() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['check_user'])) {

      $email = $_POST['email'];
      $pass = $_POST['pass'];


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
