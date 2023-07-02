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
            
        if(!empty($id)){  
            $id_movie= $id[':ID']; 
            $movie= $this->model->get_movie($id_movie);
            if(!empty($movie)){
                
                return $this->json_response($movie, 200);
            }else{
                
                return $this->json_response("La pelicula con el id={$id_movie} no existe", 404);
            }

        }else{
            
        return $this->json_response(null, 404);
        }

    }


    function get_movies(){   
        if(!empty($_GET['sort'])){
            $movies=$this->get_movies_ordenadas();    
        }else if( !empty($_GET['id_gender'])){
            $movies=$this->get_moviesXgender();
        }
        else{
            $movies= $this->model->get_movies();
            if(!empty($_GET['page'])){

            $movies = $this->paged_movies($movies,$_GET['page']);
            DIE();
            }
            } 
        if(!empty($movies)){
            return $this->json_response($movies, 200);
        }else{
            return $this->json_response("no hay peliculas disponibles", 404);
        }

    }
    function get_movies_ordenadas(){
        
        $sort=$_GET['sort'];
        
            if($sort=='id_movie'||$sort=='movie_name' || $sort=='id_gender' || $sort== 'movie_date'){
                if(!empty($_GET['order'])){
                    $order= $_GET['order'];
                    $movies= $this->model->get_movies_ordenadas($sort,$order);
                    return $movies;
                }else{
                    $movies=$this->model->get_movies_ordenadas($sort);
                    return $movies;
                }
               
            }else{
                return $this->json_response("parametro inexistente", 404);
            }

    }

    function get_moviesXgender(){
        $id_gender=$_GET['id_gender'];
        $gender=$this->model_genders->get_gender($id_gender);
    
       
        if(!empty($gender)){
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

   
    function add_movie(){
      
        
            $body=$this->getData();
            if($this->body_verify($body)){
                return $this->Json_response("existen campos incompletos", 404);
               }

            if(!empty($body)){
            $this->model->add_movie($body->movie_name, $body->movie_image,      $body->synopsis, $body->id_gender,$body->movie_date);
             return $this->json_response("La pelicula fue agregada con exito", 201);
            }

        }


    function eddit_movie($params = null) {
        
        $id = $params[':ID'];
        $body = $this->getData();
           if($this->body_verify($body)){
            return $this->Json_response("no se admite campos vacios", 404);
            
           }
           
        $movie = $this->model->get_movie($id);
        if ($movie) {
            $this->model->edit_movie( $body->movie_name, $body->movie_image, $body->synopsis, $body->id_gender,$body->movie_date, $id);
                return $this->json_response("La pelicula fue modificada con exito", 200);
        } else
                return $this->Json_response("La pelicula con el id={$id} no existe", 404);
        }

        function body_verify($body){
            return empty($body->movie_name)|| empty($body->movie_image)|| empty($body->synopsis)|| empty($body->id_gender)|| empty($body->movie_date);
        }
        function paged_movies($movies,$page){
            
            $paged = array_chunk($movies,5);
            if(count($paged)>=$page){
                $index = $page-1;
            return $paged[$index];
            }else{
                return $this->Json_response("pagina no encontrada",404);
            }
            
     }
     
        
    }

?>