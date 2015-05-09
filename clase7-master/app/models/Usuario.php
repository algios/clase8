<?php


class Usuario extends Eloquent {

    protected $table = 'usuario';

    public function misPublicaciones(){
    return Publicacion::where('user_id',$this->id)
                                        ->orderBy('id','desc')
                                        ->get();
      

}
}