<?php


class User {

private $connection;


public function __construct(){
    $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if (!$this->connection->set_charset("utf8mb4")) {
        printf("Error cargando el conjunto de caracteres utf8mb4: %s\n", $this->connection->error);
        exit();
    }
}

// Obtener todos los usuarios en la BD. Lo necesitamos? Si sí, está hecho
public function getAllUsers(){
    $SQLsentencia = "SELECT `id`, `username`, `hashedPassword`, `email` FROM `users` "; //añadir campos?

    $usuarios= $this->connection->query($SQLsentencia);
    return $usuarios->fetch_all(MYSQLI_ASSOC);
}

// Registrarse sin coche. Creo que tenemos que añadir formulario para añadir los coches del usuario
public function addUsuario($clientId, $role, $car, $username, $email, $hashedPassword, $birthday){ // Está hecho

    $SQLprepare = "INSERT INTO `users`(`id_client`, `id_role`, `username`, `email`, `hashedPassword`, `birthday`) VALUES (?,?,?,?,?,?,?)";

    $sentenciaPrepare = $this->connection->prepare($SQLprepare);
    $sentenciaPrepare->bind_param("iissss",$clientId, $role, $username, $email, $hashedPassword, $birthday);

    return $sentenciaPrepare->execute();
}

client_name client_surname client_phone client_email client_document_type client_document_number client_direction client_region client_country

public function addCliente($name, $surname, $phone, $emailClient, $documentType, $documentNumber, $direction, $region, $country){ // O debe que estar dentro de addUser()? pensar

    $SQLprepare = "INSERT INTO `clients`(`client_name`, `client_surname`, `client_phone`, `client_email`, `client_document_type`, `client_document_number`, `client_direction`, `client_region`, `client_country`) VALUES (?,?,?,?,?,?,?,?,?,?)";

    $sentenciaPrepare = $this->connection->prepare($SQLprepare);
    $sentenciaPrepare->bind_param("sssssssss",$name, $surname, $phone, $emailClient, $documentType, $documentNumber, $direction, $region, $country);

    return $sentenciaPrepare->execute();
}


public function getIdUser($username){ // Está hecho
    $SQLsentencia = "SELECT users.id  FROM users WHERE users.username = '$username'";
    $response = $this->connection->query($SQLsentencia);
    $id = $response->fetch_object();
    return $id->id;
}


public function checkUserByCredentials($username, $password){ //Está hecho
    $SQLsentencia = "SELECT users.username, users.hashedPassword, users.email FROM users WHERE users.username = '$username' AND users.hashedPassword = '$password'";
    $usuario= $this->connection->query($SQLsentencia);
    return $usuario->num_rows;

}




}
