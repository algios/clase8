<?php
class ProfileController extends BaseController{
    
    public function getIndex(){
         $amigos = Usuario::all();
        $s = "";
        foreach ($amigos as $amigo) {
            $s.=",\"{$amigo->nombre}\"";
        }
        
        $s=substr($s, 1);
        
        $usuario = Usuario::find(Auth::user()->id);
$publicaciones=$usuario->misPublicaciones();
$listoffriends=$usuario->misAmigos();
    return View::make('perfil.perfil')
                    ->with("nombre",Auth::user()->nombre)
                    ->with("publicaciones",$publicaciones)
                    ->with('friends',$s)
                    ->with("foto",Auth::user()->id.".jpg")
                    ->with("usuario",$usuario)
                    ->with('amigos',$listoffriends);
        
        
    }
    public function getVer($id){
        if($id==Auth::user()->id){return Redirect::to("/profile");}
        $usuario = Usuario::find($id);
        if($usuario){
            
           $publicaciones=$usuario->misPublicaciones();
          
           $listoffriends=$usuario->misAmigos();
            return View::make('perfil.perfil')
                    ->with("nombre",$usuario->nombre)
                    ->with("publicaciones",$publicaciones)
                    ->with("usuario",$usuario)
                    ->with("foto",$usuario->id.".jpg")
                     ->with('amigos',$listoffriends);
                    
        }
        else{
            return Redirect::to("/profile");
        }
    }
    public function missingMethod($parameters = array())
{
   return Redirect::to("/");
}
}
