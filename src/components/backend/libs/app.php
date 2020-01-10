<?php
$upOne = dirname(__DIR__,1);
require_once $upOne . '/controllers/errorShown.php';
class App{
   function __construct(){
      $upOne = dirname(__DIR__,1);
      // echo "<p>New app</p>";
      //check if the url exists
      $url =isset($_GET['url']) ? $_GET['url']:null;
      $url = rtrim($url, '/');
      $url = explode('/', $url);
      //if url is empty
      if(empty($url[0])){
         $controllerArchive = $upOne . '/controllers/main.php'; 
         require_once $controllerArchive;
         $controller = new Main();
         $controller->loadModel('Main');
         return false;
      }
      //var_dump($url);
       
      $controllerArchive = $upOne . '/controllers/' . $url[0] . '.php';
       
      if (file_exists($controllerArchive)){
         require_once $controllerArchive;
         $controller = new $url[0];
         $controller->loadModel($url[0]);
         if (isset($url[1])){
            $controller->{$url[1]}();
         }
      }else{
         $controller = new ErrorShown();
      }
   }
}
?>