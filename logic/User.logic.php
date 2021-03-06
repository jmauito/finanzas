<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Mauricio Zárate
 */

require_once $GLOBALS['CFG']->path . 'models/User.model.php';
require_once $GLOBALS['CFG']->path . 'class/ErrorHandler.php';

class UserLogic extends User {
    
    public function setUser($value){
        parent::setUser($value);
    }
    public function setEmail($value) {
        parent::setEmail($value);
    }
    public function setPassword($value) {
        parent::setPassword($value);
    }
    public function setActivo($value) {
        parent::setActivo($value);
    }

    private function errorHandler($code,$message,$file=NULL,$line=NULL){
        /*TODO:
        Crear manejador de errores para los json
         *          */
        $error = new ErrorHandler();
        $error->setErrorArray(['code'=>$code, 
                                'message'=>$message
                               ],$file, $line
                );
    }
    
    public function get($id){
        if(FALSE === parent::getData($id)){
            return FALSE;
        }
        return TRUE;
    }
    
    public function getByUser($user){
        if(FALSE === parent::getByUser($user)){
            return FALSE;
        }
        return TRUE;
    }
    
    public function validatePassword($password){
        return parent::validatePassword($password);
    }
    
    public function listar($criterios = array(), $id = NULL){
        $list= parent::arraylist($criterios, $id);
        $json =  json_encode($list);
        if (json_last_error() !== JSON_ERROR_NONE){
            $this->errorHandler(json_last_error(),  json_last_error_msg());
            return false;
        }
        return $json;
    }
    /*
    public function insert(){
        if (FALSE === $result = parent::insert()){
            return json_encode([
                'status' => 'FAIL',
                'message' => parent::getErrorMessage(),
            ]);
            return json_encode($result);
        } 
        return json_encode(['status' => 'OK', 
            'message' => "Nuevo registro creado con código: "
                . "{$result['id']}"]);
    }
    */
    /*
    public function update(){
        if (FALSE === $result = parent::update()){
            return json_encode(parent::getErrorMessage());
        }
        return json_encode("Registros actualizados: {$result['rows']}");
    }
    */
    /*
    public function delete(){
        if (FALSE === $result = parent::delete()){
            return json_encode(parent::getErrorMessage());
        }
        return json_encode("Registros eliminados: $result");
    }
    */
}

# Test listar:
//$empresa = new UserLogic();
//$result = $empresa->listar();
//var_dump($result);

#Test insert()
#$empresa = new UserLogic();
#$empresa->setNombre("La mega");
//echo $empresa->insert();

# $empresa->listar([],'id');
#Test update()
//$empresa = new UserLogic();
//if(FALSE===$empresa->get(5)){
//    echo "Error ";
//    exit;
//}
//echo '<pre>';
//print_r($empresa);
//echo '</pre>';
//$empresa->setNombre("Coralcentro-Batán");
//echo $empresa->update();
//echo '<pre>';
//print_r($empresa);
//echo '</pre>';


