<?php


class User {

private $connection;


public function __construct()
{
    $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if (!$this->connection->set_charset("utf8mb4")) {
        printf("Error cargando el conjunto de caracteres utf8mb4: %s\n", $this->connection->error);
        exit();
    }
}


//obtener todos los usuarios en la BD
public function getAllUsers(){
    $SQLsentencia = "SELECT `id`, `username`, `hashedPassword`, `email`, `created_at` FROM `users` "; //añadir campos

    $usuarios= $this->connection->query($SQLsentencia);
    return $usuarios->fetch_all(MYSQLI_ASSOC);
}



public function addUsuario($username,$password,$email){

    $SQLprepare = "INSERT INTO `users`(`username`, `hashedPassword`, `email`)
                    VALUES (?,?,?)"; //añadir campos

    $sentenciaPrepare = $this->connection->prepare($SQLprepare);
    $sentenciaPrepare->bind_param("sss",$username,$password,$email);

    return $sentenciaPrepare->execute();
}


public function getIdUser($username){
    $SQLsentencia = "SELECT users.id  FROM users WHERE users.username = '$username'";
    $response = $this->connection->query($SQLsentencia);
    $id = $response->fetch_object();
    return $id->id;
}


public function checkUserByCredentials($username, $password){
    $SQLsentencia = "SELECT users.username, users.hashedPassword, users.email FROM users WHERE users.username = '$username' AND users.hashedPassword = '$password'";
    $usuario= $this->connection->query($SQLsentencia);
    return $usuario->num_rows;

}




}