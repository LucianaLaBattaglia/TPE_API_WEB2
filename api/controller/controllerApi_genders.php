<?php

require_once "api.php";
require_once "./model/model_genders.php";
require_once "./model/model_movies.php";


class controllerApi_genders extends api{
 
    private $model;
    private $model_movies;

    function __construct(){
    parent::__construct();
    $this->model= new model_genders();
    $this->model_movies= new model_movies();

    }

    public function get_genders(){
        
        $data= $this->model->get_genders();
    
        if(isset($data)){
            return $this->json_response($data, 200);
        }else{
            return $this->json_response('no existen generos', 404);
        }

    }
    public function eddit_gender($params = null) {
        
        $id = $params[':ID'];
        $data = $this->getData();
        if($this->data_verify($data)){
            return $this->Json_response("No se admiten campos vacios", 404);
        }
        $gender = $this->model->get_gender($id);
        if ($gender) {
            $this->model->edit_gender( $data->name_gender,$data->prox_estreno,$data->amount, $id);
            return $this->json_response("El genero fue modificado con exito.", 200);
        } else
            return $this->Json_response("El genero con el id={$id} no existe", 404);
    }


    public function add_gender() {
        
        
            $data = $this->getData();
            
            // if($this->data_verify($data)){
            //     return $this->Json_response("No se admiten campos vacios", 404);
            // }
            
            // if(!empty($data)){
            $this->model->add_gender( $data->name_gender,$data->prox_estreno);
            return $this->json_response("El genero fue creado con exito.", 201);
            // }
    }
   
    public function delete_gender($params=[]){
        $gender_id=$params[':ID'];
        $gender=$this->model->get_gender($gender_id);
        $movie=$this->model_movies->movieXgender($gender_id);
        
        if($gender){
            if((!empty($movie))){
            $this->model->delete_gender($gender_id);
            return $this->json_response("eliminada con exito", 200);
            }else{
                return $this->json_response("El genero con el id={$gender_id} no pudo eliminarse, contiene peliculas", 404);
            }
            
        }else{
            return $this->json_response("El genero con el id={$gender_id} no existe", 404);
        }
    
    }

    function data_verify($data){
        return empty($data->name_gender)|| empty($data->prox_estreno);
    }








}




?>



