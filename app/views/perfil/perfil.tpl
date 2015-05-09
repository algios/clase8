{capture assign="left"}
    {Auth::check()}
    <center><img src="{url('assets/img/profile')}/{$foto}" height="150" width="150"></center>
    <div class="well">
        <center><p>{$usuario->nombre}</p></center>
        <center><p>{$usuario->correo}</p></center>
    </div>
    <hr>
        <div class="row">
            <center><h3>Amigos</h3></center>
    {foreach $amigos as $amigo}
        <div class='col-sm-4'>
            <a href='{url('profile/ver')}/{$amigo->id}'><img src="{url('assets/img/profile')}/{$amigo->id}.jpg" height="70" width="70"></a>
           <p>{$amigo->nombre}</p>
        </div>
        {/foreach}
</div>
        
{/capture}
    
{capture assign="right"}
    {Form::open(['url'=>'publicacion/crear'])}
    <textarea required="" name="publicacion" placeholder="¿Que estas pensando?" rows="3" class="col-lg-12"></textarea>
   <input type='text' value='{$usuario->id}' name='receptor'>
    <button class="btn pull-right btn-success">Publicar</button>
    {Form::close()}
    <hr>
    <br>
    <br>
    <br>
    {foreach $publicaciones as $publicacion}
        <div class="well" style="word-break: break-all;"margin-bottom: 5px; padding: 10px 5px; font-family: 'Roboto Condensed', sans-serif;">
             <button class="close" aria-hidden="true" style="margin-top: -10px;"><a href="{url('publicacion/eliminar')}/{$publicacion->id}" style='text-decoration: none'>&times;</a></button>
            <img src="{url('assets/img/profile')}/{$amigo->id}.jpg" height="40" width="40"> 
            {$publicacion->publicacion}
             
            </div>
            <div>
                
            <span class="glyphicon glyphicon-comment"></span><span>Comentar</span> |
            <span class="glyphicon glyphicon-thumbs-up"></span><span onclick="fb.meGusta({$publicacion->id})">Me gusta |</span> 
            <span class="glyphicon glyphicon-thumbs-up"></span>{Publicacion::likes($publicacion->id)} personas les gusta esto  
            <div id="comentarios-{$publicacion->id}">
                <div style="font-size: 10px; padding: 3px;" class="well well-sm col-sm-7">Esto es un comentario</div>
            </div>
            <br><textarea id="comentario-{$publicacion->id}" rows="1" placeholder="Escribe tu comentario..." class="col-sm-6"></textarea>
            <button class="btn btn-sucess btn-sm" onclick="fb.comentar({$publicacion->id})">Comentar</button>
            </div>
            <hr>
            {foreachelse}
                <div class="alert alert-danger">
                    No hay publicaciones
                </div>
        {/foreach}
    {/capture}
    {capture assign="portada"}
        <img src="http://www.portadastimeline.com/wp-content/uploads/2012/07/aguanta-portadas-para-facebook.jpg"
             {/capture}
    
    {include file="../masterpage/template.tpl" layout="two_columns"}