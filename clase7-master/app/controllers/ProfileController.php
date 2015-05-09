<?php
class ProfileController extends BaseController{
    
    public function getIndex(){
         $amigos = Usuario::all();
        $s = "";
        foreach ($amigos as $amigo) {
            $s.=",\"{$amigo->nombre}\"";
        }
        
        $s=substr($s, 1);
        
$publicaciones=Usuario::find(Auth::user()->id)->misPublicaciones();
    return View::make('perfil.perfil')
                    ->with("nombre",Auth::user()->nombre)
                    ->with("publicaciones",$publicaciones)
                    ->with('friends',$s)
                    ->with("foto",Auth::user()->id.".jpg");
        
        
    }
    public function getVer($id){
        if($id==Auth::user()->id){return Redirect::to("/profile");}
        $usuario = Usuario::find($id);
        if($usuario){
            $publicaciones=$usuario->misPublicaciones();
            return View::make('perfil.perfil')
                    ->with("nombre",$usuario->nombre)
                    //->with("publicaciones",$publicaciones)
                    //->with('friends',$s)
                    ->with("foto",$usuario->id.".jpg");
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
