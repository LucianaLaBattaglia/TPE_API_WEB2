<?php

class model_movies{
    private $db;
public function __construct(){

    try{
        $this->db = new PDO('mysql:host=localhost;dbname=db_movies','root','');
       
    }catch(PDExeption $e){
        echo $e;
    }
}


function get_movies(){
    //trae la tabla de peliculas
    $sentense = $this->db->prepare("SELECT * FROM movies");
    $sentense->execute();
    return $sentense->fetchAll(PDO::FETCH_OBJ);
}
function get_home_movies(){
    $sentense = $this->db->prepare("SELECT * FROM movies");
    $sentense->execute();
    $movies = $sentense->fetchAll(PDO::FETCH_OBJ);
    $aux=[];
        if(count($movies)<=10){
           $aux = $movies;
        }else{
            for($i=0;$i<10;$i++){
                $aux[]=$movies[$i];
            }
        }
    return $aux;
}
function get_all(){
    //trae las tablas de genero y peliculas unidas
    $sentense = $this->db->prepare("SELECT * FROM `movies`JOIN `genders` ON genders.id_gender = movies.id_gender");
    $sentense->execute();
    return $sentense->fetchAll(PDO::FETCH_OBJ);
}
function movieXgender($id){
    $sentense = $this->db->prepare("SELECT * FROM `movies`JOIN `genders` ON genders.id_gender = movies.id_gender WHERE movies.id_gender = ?");
    $sentense->execute([$id]);
    return $sentense->fetchAll(PDO::FETCH_OBJ);
}
function get_movieDetail($id){

    $sentense= $this->db->prepare("SELECT * FROM `movies`JOIN `genders` ON genders.id_gender = movies.id_gender WHERE movies.id_movie=?");
    $sentense ->execute([$id]);
    return $sentense->fetchAll(PDO::FETCH_OBJ);
}


function delete_movie($id){
    //borra una pelicula
    $sentense = $this->db->prepare("DELETE FROM movies WHERE movies.id_movie = ?");
    $sentense->execute([$id]);
}
function add_movie($movie_name, $movie_image, $id_gender, $movie_data, $synopsis){
    $sentense = $this->db->prepare('INSERT INTO movies (movie_name,'."movie_image".',id_gender,'."movie_date".',synopsis) VALUES (?,?,?,?,?)');
    $sentense->execute(array($movie_name, $movie_image, $id_gender, $movie_data, $synopsis));
    header('location:'.URL_BASE.'/movieList');
}

function edit_movie($movie){
    $sentense = $this->db->prepare('UPDATE movies SET movie_name=?,movie_image=?,id_gender=?,movie_date=?,synopsis=? WHERE id_movie = ?');
    $sentense->execute($movie);
}
function get_movie($id){
    $sentense = $this->db->prepare("SELECT * FROM movies WHERE id_movie = ?");
    $sentense->execute([$id]);
    return $sentense->fetch(PDO::FETCH_OBJ);

}
function gender_update($genero,$id){
    //gace un update en la tabla generos con el resultado de la funcion contar como parametro
    $consulta = $this->db->prepare("UPDATE genders SET amount = ? WHERE id_gender = ?");
    $consulta->execute([$genero,$id]);
}
}
?>