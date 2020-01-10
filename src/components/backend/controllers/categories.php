<?php

class Categories extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('categories/index');
        //echo "<p>new controller main</p>";
    }
}

?>