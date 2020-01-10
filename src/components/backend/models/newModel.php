<?php
class newModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        //insert data in the DB
        //$this->db->connect
        try{
            $query = $this->db->connect()->prepare('INSERT INTO adminblog (
                userId, userName, userSurname, user_pass, user_login) VALUES
                (:userId, :userName, :userSurname, :user_pass, :user_login)');
            $query->execute(['userId'=>$data['userId'], 'userName'=>$data['userName'],
            'userSurname'=>$data['userSurname'], 'user_pass'=>$data['user_pass'], 
            'user_login'=>$data['user_login']]);
            echo "insert data";
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
        
    }

}
?>