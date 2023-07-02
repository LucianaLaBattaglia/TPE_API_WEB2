<?php
include_once "./model/model_login.php";
require_once "api.php";

class controllerApi_login{


    private $model;
   
   
    function __construct()
    {

        $this ->model= new model_login();
        

    }

    
    function verify_user(){
        $body=$this->getData();
        $user= $post['name_user'];
        $pass= $post['password'];
        $dbuser=$this->model->get_user($user);
        if(!empty($dbuser->name_user)){
            if (password_verify($pass,$dbuser->password)){
        
    
            }else{
            
        }
        else{ 
    
        }

    }

}

}
    ?>