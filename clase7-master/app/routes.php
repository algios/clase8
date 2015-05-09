<?php

Route::get('/', function() {
    if(Auth::check()){
        return Redirect::to('/profile');
    }
    return View::make('general.login');
});
Route::get('/profile',array('before' => 'auth', function() {
    $publicaciones = Publicacion::orderBy('id','desc')->get();
    return View::make('perfil.perfil')
                    ->with("nombre",Auth::user()->nombre)
                    ->with("publicaciones",$publicaciones);
}));

Route::post('/loguear', function() {
    $email = Input::get('correo');
    $password = Input::get('password');

    if (Auth::attempt(['correo' => $email, 'password' => $password])) {
        return Redirect::to("/profile");
    } else {
        echo "el usuario no esta logueado";
    }
});
Route::get('/logout', function() {
    Auth::logout();
    return Redirect::to("/");
});
Route::group(array('before'=>'auth'),function(){
Route::controller('publicacion', 'PublicacionController');
Route::controller('personal', 'PersonalController');
Route::controller('profile', 'ProfileController');
});