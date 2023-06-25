<?php

class model_login{
    private $db;
public function __construct(){

        $this->db = new PDO('mysql:host=localhost;dbname=db_movies','root','');
       
    
}


function get_user($user){
    $sentence=$this->db->prepare("SELECT* from users WHERE name_user=? ");
    $sentence->execute(array($user));
    return $sentence->fetch(PDO::FETCH_OBJ);

}




}
?>