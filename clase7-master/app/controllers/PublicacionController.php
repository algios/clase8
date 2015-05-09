<?php

class publicacionController extends BaseController{
   
    public function postCrear(){
       $publicaciones= [
           'publicacion' => Input::get('publicacion'),
            'tipo'=>'0',
            'user_id'=>Auth::user()->id
                  
   ];
   DB::table('publicacion')->insert($publicaciones);
   return Redirect::to("/profile");
   } 
   public function postComentar(){
       
   } 
   public function getEliminar($id){
       $publicacion = Publicacion::find($id);
       if($publicacion && $publicacion->user_id==Auth::User()->id){
          $publicacion->delete();
       }
       return Redirect::to("/profile");
   } 
}


