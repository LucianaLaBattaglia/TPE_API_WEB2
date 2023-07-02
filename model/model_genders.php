<?php

class model_genders{
    private $db;
public function __construct(){

 
        $this->db = new PDO('mysql:host=localhost;dbname=db_movies','root','');
       
}

function get_genders(){
    //trae la tabla de generos
    $sentense=$this->db->prepare("SELECT * from genders");
    $sentense->execute();
    return $sentense-> fetchAll(PDO::FETCH_OBJ);
}

function get_gender($id){
    $sentense = $this->db->prepare("SELECT * FROM genders WHERE id_gender = ?");
    $sentense->execute([$id]);
    return $sentense->fetch(PDO::FETCH_OBJ);
}


function add_gender($name_gender, $prox_estreno){
    $sentense=$this->db->prepare("INSERT INTO `genders` (`name_gender`, `prox_estreno`) VALUES (?, ?)");
    
    $sentense->execute(array($name_gender, $prox_estreno));
   
}

function edit_gender($name, $prox_estreno,$amount, $id){
    //edita un genero

    $sentense=$this->db->prepare("UPDATE genders SET name_gender=?, prox_estreno=?,amount=? WHERE genders.id_gender = ?");
    $sentense->execute(array($name, $prox_estreno,$amount, $id));
   
}

function delete_gender($id){
    //borra un genero
    $sentense = $this->db->prepare("DELETE FROM genders WHERE genders.id_gender = ?");
    $sentense->execute([$id]);
   
}







}
?>
