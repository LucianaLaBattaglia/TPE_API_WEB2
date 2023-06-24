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
        
        $tarea = $this->model->get_gender($id);
        if ($tarea) {
            $this->model->edit_gender( $data->name_gender,$data->prox_estreno,$data->amount, $id);
            return $this->json_response("La pelicula fue modificada con exito.", 200);
        } else
            return $this->Json_response("La pelicula con el id={$id} no existe", 404);
    }
}











?>



