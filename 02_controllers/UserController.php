<?php

require 'models/User.php';


class UserController{

   public function home(){ // ??
    require "03_views/home/home.php";
   }

   // Crear un nuevo usuario
   public function create()
   {
      require "03_views/home/register_user.php";
   }


   // Obtener los datos del formulario
   public function store()
   {

      if (isset($_POST['registrarUsuario'])) {
         if($_POST['hashedPassword'] == $_POST['hashedPassword2']){
            $clientId = 0; // No entiendo. 0 pero si hay un cliente - UPDATE en sql??
            $role = "User"; // Cuál tenemos? Por default - "user" o algo así
            $username = $_POST['username'];
            $email = $_POST['email'];
            $hashedPassword = $_POST['hashedPassword'];
            $hashedPassword = password_hash($hashedPassword, PASSWORD_DEFAULT);
            $birthday = $_POST['fechaNac'];
            
            $usuarioModel = new User();
            $usuarioModel->addUsuario($clientId, $role, $username, $email, $hashedPassword, $birthday);
            $msg = "Usuario Registrado <br/>";
            require "views/home.php";
         }else{
            $msg = "Las contraseñas no son iguales";
         }
      }
   }


      // Crear un nuevo cliente
      public function finalizarPago()
      {
         require "03_views/home/register_pago.php";
      }
   
   
      //obtener los datos del formulario
      public function storeCliente()
      {
   
         if (isset($_POST['registrarCliente'])) {
   
            $name = $_POST['clientName'];
            $surname = $_POST['clientSurname'];
            $phone = $_POST['clientPhone'];
            $emailClient = $_POST['clientEmail'];
            $documentType = $_POST['clientDocumentType'];
            $documentNumber = $_POST['clientDocumentNumber'];
            $direction = $_POST['clientDirection'];
            $region = $_POST['clientRegion'];
            $country = $_POST['clientCountry'];
            
            $clienteModel = new User();
            $clienteModel->addCliente($name, $surname, $phone, $emailClient, $documentType, $documentNumber, $direction, $region, $country);
            $msg = "Cliente Registrado <br/>";
            require "views/home.php";
         }
      }
   

}
