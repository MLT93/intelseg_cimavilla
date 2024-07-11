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
         if($_POST['hashedPassword'] == $_POST['hashedPassword2']){
            $clientId = ""; // No entiendo. 0 pero si hay un cliente - UPDATE en sql??
            $role = "usuario"; // Cuál tenemos? Por defolt - "user" o algo así
            $username = $_POST['username'];
            $email = $_POST['email'];
            $hashedPassword = $_POST['hashedPassword'];
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


      // crear un nuevo cliente
      public function createCliente()
      {
         require "views/home/register_cliente.php";
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
