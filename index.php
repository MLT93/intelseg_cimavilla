<?php

// ! RECUERDA: los directorios de importación se tienen en cuenta desde este archivo porque todo se carga aquí

// DEFINO UNAS CONSTANTES CON LA INFORMACIÓN NECESARIA PARA CONECTARME A LA DB con `\mysqli`
// ? `DEFINE()` ESTRUCTURA NUEVAS VARIABLES CONSTANTES CON FORMATO CLAVE VALOR. POSEE 2 ARGUMENTOS
// 1. Key
// 1. Value
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'parking_cimavilla');

/*
  1. Este es el punto de entrada de mi aplicación desde el directorio raíz. Aquí se cargan todos los archivos
*/
require_once('./Router.php'); // Aquí llamo al enrutador para que gestione las rutas ("agente de tráfico")

$router = new Router();

// El método `addRoute()` añade un nuevo `Endpoint` a mi sitio
/*
  1. La ruta raíz o base, es el directorio base donde está alojado el proyecto (/intelseg_cimavilla/)
  2. La ruta del host, es el servidor ('http://localhost')
  3. Por lo tanto, deberé escribir la ruta raíz más el `Endpoint` que yo desee (`/index`, `/list`, `/register`, `/store`, `/detail{id}`) en el primer parámetro de `addRoute()`
  4. Elijo el controlador
  5. Elijo el método (action)
*/
$router->addRoute('/intelseg_cimavilla/', 'HomeController', 'index'); // Esta es la ruta principal del directorio del proyecto (desde la raíz del servidor). Es el `home` de la página, y tiene que ser igual que la ruta especificada en `.htaccess`
$router->addRoute('/intelseg_cimavilla/login/', 'HomeController', 'login'); // Esta es la ruta principal del directorio del proyecto (desde la raíz del servidor). Es el `home` de la página, y tiene que ser igual que la ruta especificada en `.htaccess`
$router->addRoute('/intelseg_cimavilla/login/check/', 'HomeController', 'checkUser'); // Esta es la ruta principal del directorio del proyecto (desde la raíz del servidor). Es el `home` de la página, y tiene que ser igual que la ruta especificada en `.htaccess`
$router->addRoute('/intelseg_cimavilla/detail/{id}', 'EjemploController', 'pathVariables'); // Esta es la ruta principal del directorio del proyecto (desde la raíz del servidor). Es el `home` de la página, y tiene que ser igual que la ruta especificada en `.htaccess`
$router->addRoute('/intelseg_cimavilla/detail/', 'EjemploController', 'queryParams'); // Esta es la ruta principal del directorio del proyecto (desde la raíz del servidor). Es el `home` de la página, y tiene que ser igual que la ruta especificada en `.htaccess`

$router->addRoute(__DIR__ . '/intelseg_cimavilla/register/', 'UserController', 'create'); // Sacar el formulario para registrarse
$router->addRoute(__DIR__ . '/intelseg_cimavilla/store/', 'UserController', 'store'); // Registrar el usuario en BD
$router->addRoute(__DIR__ . '/intelseg_cimavilla/finalizar-pago/', 'UserController', 'finalizarPago'); // Sacar el formulario para registrar el ckiente
$router->addRoute(__DIR__ . '/intelseg_cimavilla/store-cliente/', 'UserController', 'storeCliente'); // Registrar el cliente en BD

// Obtener la ruta solicitada
$_SERVER["REQUEST_URI"]; // Devuelve toda la URI
parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); // Devuelve la URI sin Query Params
parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY); // Devuelve los Query Params solamente

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$query = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY);

parse_str($query, $queryParams); // Convierte el string en un array asociativo y lo guarda en la variable `$queryParams` que se asigna como segundo argumento
// print_r($queryParams);

// `dispatch` será el método que enrute la página
$router->dispatch($uri);

// Si la variable `$queryParams` no está vacía, asocio los key/value que posea el array a la súper variable `$_GET` para que queden accesibles en todo el proyecto
if (!empty($queryParams)) {
  foreach ($queryParams as $key => $value) {
    $_GET[$key] = $value;
  }
}
