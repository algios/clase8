<?php


class Usuario extends Eloquent {

    protected $table = 'usuario';

    public function misPublicaciones(){
    return Publicacion::where('receptor',$this->id)
                                        ->orderBy('id','desc')
                                        ->get();
    }
    public function misamigos(){
    return Usuario::where('id','<>',$this->id)
                                        ->orderBy('id','desc')
                                        ->get();
      


    }
}