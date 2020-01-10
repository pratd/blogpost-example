<?php

class passwordError extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->message ="Password should be at least 8 characters in length and 
        should include at least one upper case letter, one number";
        $this->view->render('errors/password');
    }
}

?>