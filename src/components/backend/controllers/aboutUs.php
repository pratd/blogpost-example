<?php

class aboutUs extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('aboutUs/index');
        //echo "<p>new controller main</p>";
    }
}

?>