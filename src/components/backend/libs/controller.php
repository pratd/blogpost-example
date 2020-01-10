<?php
class Controller{
    function __construct(){
        //echo "<p>base controller</p>";
        $this->view = new View();
    }

    function loadModel($model){
        $url= "/models/" .substr($model,0, 8).'.php';//slicing the `Controller` string to 
        //get to the models folder with newModel instead of newModelController;
        $upOne = dirname(__DIR__,1);
        //echo $upOne. $url;
        if(file_exists($upOne .$url)){
            //echo $upOne.$url;
            require $upOne.$url;
            
            $modelName=substr($model,0, 8);
            $this->model = new $modelName();
            
        }
    }
}
?>