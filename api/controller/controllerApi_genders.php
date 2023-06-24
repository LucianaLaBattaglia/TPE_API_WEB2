<?php

require_once "api.php";
require_once "./model/model_genders.php";



class controllerApi_genders extends api{
 
    private $model;

    function __construct(){
    parent::__construct();
    $this->model= new model_genders();

    }

    function get_genders(){
        
    
            $data= $this->model->get_genders();
    
        if(isset($data)){
            return $this->json_response($data, 200);
        }else{
            return $this->json_response(null, 404);
        }

    }
    public function eddit_gender($params = null) {
        
        $id = $params[':ID'];
        $data = $this->getData();
        
        $movie = $this->model->get_gender($id);
        if ($movie) {
            $this->model->edit_gender( $data->name_gender,$data->prox_estreno,$data->amount, $id);
            return $this->json_response("El genero fue modificado con exito.", 200);
        } else
            return $this->Json_response("El genero con el id={$id} no existe", 404);
    }


    public function add_gender($params =[]) {
        
        if(sizeof($params)!=0){
            $data = $this->getData();
            $this->model->add_gender( $data->name_gender,$data->prox_estreno);
            return $this->json_response("El genero fue creado con exito.", 200);
        } else
            return $this->Json_response("Fallo crear genero", 404);
    }











}




?>



