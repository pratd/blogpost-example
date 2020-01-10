<?php

class newModelController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('new/index');
        //echo "<p>new controller main</p>";
    }

    function registerUser(){
        // Validate password strength
        
        $emailId  = $_POST['emailId'];
        $name     = $_POST['name'];
        $surname  = $_POST['surname'];
        $password = $_POST['password'];
        $userId   = $_POST['userId'];
        //validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $url= "/contorllers/passwordError.php";
            if(file_exists($url)){
                require $url;
                $controller= new passwordError();
            }
        }else{
            $this->model->insert(['userId'=>$userId, 'userName' =>$name,
            'userSurname'=>$surname, 'user_pass'=>$password, 'user_login'=>$emailId ]);
            
            echo "User registered";
            //var_dump($this->model) ;
           // $this->model->insert();
        }
        
        
    }
}

?>