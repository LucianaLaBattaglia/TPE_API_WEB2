<?php

class model_login{
    private $db;
public function __construct(){

    try{
        $this->db = new PDO('mysql:host=localhost;dbname=db_movies','root','');
       
    }catch(PDExeption $e){
        echo $e;
    }
}


function get_user($user){
    $sentence=$this->db->prepare("SELECT* from users WHERE name_user=? ");
    $sentence->execute(array($user));
    return $sentence->fetch(PDO::FETCH_OBJ);

}




}
?>