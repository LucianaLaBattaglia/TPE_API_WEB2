<?php

require_once "api.php";
require_once "./model/model_movies.php";
require_once "./model/model_genders.php";



class controllerApi_movies extends api{
 
    private $model;
    private $model_genders;
    
    function __construct(){
    parent::__construct();
    $this->model= new model_movies();
    $this->model_genders=new model_genders();
    }

    function get_movie($id){
        if(sizeof($id)!=0){  
            $id_movie= $id[':ID'];  
            $movie= $this->model->get_movieDetail($id_movie);
            if(isset($movie)){
                return $this->json_response($movie, 200);
            }
        }else{
        return $this->json_response(null, 404);
        }

    }


    function get_movies(){   
        if(isset($_GET['sort']) && isset($_GET['order'])){
            $movies=$this->get_movies_ordenadas();    
        }else if( isset($_GET['id_gender'])){
            $movies=$this->get_moviesXgender();
        }
        else{
            $movies= $this->model->get_movies();
            } 
        if(isset($movies)){
            return $this->json_response($movies, 200);
        }else{
            return $this->json_response(null, 404);
        }

    }
    function get_movies_ordenadas(){
        
        $sort=$_GET['sort'];
        $order= $_GET['order'];
            if($sort=='movie_name' || $sort=='id_gender' || $sort== 'movie_date'){
                $movies= $this->model->get_movies_ordenadas($sort,$order);
                return $movies;
            }else{
                return $this->json_response("parametro inexistente", 404);
            }

    }

    function get_moviesXgender(){
        $id_gender=$_GET['id_gender'];
        $gender=$this->model_genders->get_gender($id_gender);
    
       
        if(isset($gender)){
            $movies=$this->model->movieXgender($id_gender);
            return $movies;
        }
        else{
            return $this->json_response("genero inexistente", 404);
        }


    }



    function get_movies_paginadas(){
    $page=$_GET['page'];

    $this ->model->get_movies();

    }

    function delete_movie($params=[]){
        $movie_id=$params[':ID'];
        $movie=$this->model->get_movie($movie_id);

        if($movie){
            $this->model->delete_movie($movie_id);
            return $this->json_response("eliminada con exito", 200);
        }else{
            return $this->json_response("fallo eliminar", 404);
        }

    }

   
    function add_movie($params=[]){
      
        if(sizeof($params)==0){
            $body=$this->getData();
            $this->model->add_movie($body->movie_name, $body->movie_image, $body->synopsis, $body->id_gender,$body->movie_date);
            return $this->json_response("La movie fue agregada con exito", 201);

        }else{
            return $this->json_response("fallo agregar", 404);
        }

        }


    function eddit_movie($params = null) {
        
        $id = $params[':ID'];
        $body = $this->getData();
           
        $movie = $this->model->get_movie($id);
        if ($movie) {
            $this->model->edit_movie( $body->movie_name, $body->movie_image, $body->synopsis, $body->id_gender,$body->movie_date, $id);
                return $this->json_response("La pelicula fue modificada con exito", 200);
        } else
                return $this->Json_response("La pelicula con el id={$id} no existe", 404);
        }


     }


?>