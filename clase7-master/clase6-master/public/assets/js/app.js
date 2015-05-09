var fb ={
    comentar: function(id){
        var comentario=$("#comentario-"+id)
        if(comentario.val()!=""){
            
  $.ajax({
  url: 'publicacion/comentar',
  type: 'POST',
  async: true,
  data: {
      usuario : 1,
      comentario : comentar.val()
  },
  success: function(response){
      alert('se ejecuto correctamente');
  }
});
            
        }else{
            alert('Este campo es obligatorio');
        }
    } 
};
