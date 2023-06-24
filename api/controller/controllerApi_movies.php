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
            
            $data= $this->model->get_movies();
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
        print_r($params);
      
        if(sizeof($params)==0){
            $body=$this->getData();
                echo $body->movie_name;
            $movie_name=$body->movie_name;
            $movie_image=$body->movie_image;
            $id_gender= $body->id_gender;
            $movie_data= $body->movie_data;
            $synopsis= $body->synopsis;
           
            $this->model->add_movie($movie_name, $movie_image, $id_gender,$movie_data, $synopsis);
            return $this->json_response("La movie fue agregada con exito", 200);

        }else{
            return $this->json_response("fallo agrear", 404);
        }
    

        }

     }










?>