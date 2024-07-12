<?php

// Importación de archivos


class Router
{
  // Propiedades
  private array $routes = [];

  // Constructor


  // Getters y Setters
  protected function getRoutes(): array
  {
    return $this->routes;
  }
  protected function setRoutes(array $routes)
  {
    $this->routes = $routes;
  }

  // Methods
  public function addRoute($path, $controller, $method)
  {
    /* 
      1. Esta función nos permite crear una nueva ruta, asignándole un controlador y un método del mismo controlador de forma específica
      2. Ejemplo: "/" => ['controller' => "AlumnoController", 'method' => "index"]
    */
    $this->routes[$path] = ['controller' => $controller, 'method' => $method];
  }

  public function dispatch($uri)
  {
    /* 
      1. Controlamos las rutas que posea el array `routes[]`, donde `$key` será cada ruta y `$value` el array anidado en esa clave con el controller y el método 
      2. `preg_replace` toma `$key` y sustituye el primer parámetro con el segundo. Se utilizan expresiones regulares porque nunca sabremos exactamente qué posee esa `Path Variable`
      3. El primer parámetro busca todos el contenido alfanumérico que esté entre llaves `{}` => /parking_cimavilla/detail/{id}
      4. El segundo parámetro reemplaza el primero con contenido alfanumérico
      5. El tercer parámetro es la variable donde se realizan los cambios
      6. Asignamos a una variable para poder realizar el `if`
    */
    foreach ($this->getRoutes() as $key => $value) {
      $pathPattern = preg_replace('#{[a-zA-Z][a-zA-Z0-9]*}#', '([a-zA-Z0-9]+)', $key); // Código para `:` al principio del `Query Param`. Código: `#:[a-zA-Z][a-zA-Z0-9]*#`. Ejemplo de ruta: `/parking_cimavilla/detail/:id`

      // Comprobamos si alguna de las `$pathPattern` coinciden con la URI del navegador, y se almacena en `$matches`
      if (preg_match("#^$pathPattern$#", $uri, $matches)) {

        // Utilizamos `$value` para asignar la información dinamicamente de cada controller y su método correspondiente por cada ruta específica
        $controller = $value['controller'];
        $method = $value['method'];

        require "02_controllers/$controller.php";
        $controllerInstance = new $controller();

        // var_dump($matches);
        $pathVariables = array_slice($matches, 1);

        call_user_func_array([$controllerInstance, $method], $pathVariables);

        return; // Si entra en este `if`, ejecuta el código y sale de la función para que no se ejecute `error404()`
      }
    }

    require "02_controllers/ErrorController.php";
    $controllerError = new ErrorController();
    $controllerError->error404();
  }

  // Static Methods

}
