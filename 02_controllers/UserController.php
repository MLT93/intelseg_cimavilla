<?php

require 'models/User.php';


class UserController{

   public function home(){ // ??
    require "views/home/home.php";

   }

   // crear un nuevo usuario
   public function create()
   {
      require "views/home/register_user.php";
   }


   //obtener los datos del formulario
   public function store()
   {

      if (isset($_POST['registrarUsuario'])) {

         id_client id_role id_car username email hashedPassword birthday

         $clientId = ""; // No entiendo. 0 pero si hay un cliente - UPDATE en sql??
         $role = "usuario"; // Cuál tenemos? Por defolt - "user" o algo así
         $username = $_POST['username'];
         $email = $_POST['email'];
         $hashedPassword = $_POST['hashedPassword'];
         $birthday = $_POST['fechaNac'];
         
         // Añadir comparación de dos contraseñas?
         $usuarioModel = new User();
         $usuarioModel->addUsuario($clientId, $role, $username, $email, $hashedPassword, $birthday);
         $msg = "Usuario Registrado <br/>";
         require "views/home.php";
      }
   }


}
