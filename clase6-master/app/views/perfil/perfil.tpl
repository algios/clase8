{capture assign="left"}
    <img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p148x148/11078189_10204940398604553_2685452089638599363_n.jpg?oh=9d4cc3f7357fcd7b4b3d76c9985304d7&oe=55B8D006&__gda__=1433474259_a4cb599afe613e0a4d3f18ac735a42fd" height="150" width="150">
    <div class="well">
    Informacion
</div>
{/capture}
    
{capture assign="right"}
    {Form::open(['url'=>'publicacion/crear'])}
    <textarea required="" name="publicacion" placeholder="¿Que estas pensando?" rows="3" class="col-lg-12"></textarea>
    <button class="btn pull-right btn-success">Publicar</button>
    {Form::close()}
    <hr>
    <br>
    <br>
    <br>
    {foreach $publicaciones as $publicacion}
        <div class="well" style="word-break: break-all;"margin-bottom: 5px; padding: 10px 5px; font-family: 'Roboto Condensed', sans-serif;">
             <button class="close" aria-hidden="true" style="margin-top: -10px;"><a href="{url('publicacion/eliminar')}/{$publicacion->id}" style='text-decoration: none'>&times;</a></button>
             {$publicacion->publicacion}
            </div>
            <div>
                
            <span class="glyphicon glyphicon-comment"></span><span>Comentar</span> |
            <span class="glyphicon glyphicon-thumbs-up"></span>Me gusta
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