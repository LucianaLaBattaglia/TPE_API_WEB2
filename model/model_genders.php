<?php

class model_genders{
    private $db;
public function __construct(){

    try{
        $this->db = new PDO('mysql:host=localhost;dbname=db_movies','root','');
       
    }catch(PDExeption $e){
        echo $e;
    }
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


function add_gender($gender){
    $sentense=$this->db->prepare("INSERT INTO `genders` (`name_gender`, `prox_estreno`) VALUES (?, ?)");
    $sentense->execute($gender);
   
}

function edit_gender($gender){
    //edita un genero
    $sentense=$this->db->prepare("UPDATE genders SET name_gender=?, prox_estreno=?,amount=? WHERE genders.id_gender = ?");
    $sentense->execute($gender);
   
}

function delete_gender($id){
    //borra un genero
    $sentense = $this->db->prepare("DELETE FROM genders WHERE genders.id_gender = ?");
    $sentense->execute([$id]);
   
}







}
?>
