<?php

require_once "api.php";
require_once "./model/model_movies.php";



class controllerApi_movies extends api{
 
    private $model;

    function __construct(){
    parent::__construct();
    $this->model= new model_movies();

    }

    function get_movies($id=null){
        
        if(sizeof($id)!=0){  
            $id_movie= $id[':ID'];  
            $data= $this->model->get_movie($id_movie);
        }else{
            if(isset($_GET['sort']) && isset($_GET['order'])){
            $sort=$_GET['sort'];
            $order= $_GET['order'];
                if($sort== 'id_name' || $sort=='id_gender' || $sort== 'movie_date'){
                     $data= $this->model->get_movies_ordenadas($sort,$order);
                }else{
                    return $this->json_response("parametro inexistente", 404);
                }
            }else{
                $data= $this->model->get_movies();
            }
        }
        if(isset($data)){
            return $this->json_response($data, 200);
        }else{
            return $this->json_response(null, 404);
        }

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
            return $this->json_response("La movie fue agregada con exito", 200);

        }else{
            return $this->json_response("fallo agregar", 404);
        }

        }


        public function eddit_movie($params = null) {
        
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