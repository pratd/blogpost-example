<?php

class Main extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('main/index');
        //echo "<p>new controller main</p>";
    }
}

?>