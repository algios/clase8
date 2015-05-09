<?php

class PersonalController extends BaseController{
    
    public function getRegistrar($tipo) {
        if($tipo=="medico"){
            return View::make('registro.medico');
                 
        }elseif ($tipo=='paciente') {
            return View::make('registro.paciente');
  
            
        }elseif ($tipo=='enfermera') {
            return View::make('registro.enfermera');
  
            
        }else{
            echo "Error";
        }
    }
    
    public function getEditar(){
        echo "Estoy editando...";
    }
    
    public function getEliminar(){
        echo "Estoy eliminando";
        
        
    }
}
