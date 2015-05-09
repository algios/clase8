var fb = {
    
    meGusta: function(id){
        $.ajax({
                url: baseUrl + "/publicacion/megusta",
                type: 'POST',
                async: true,
                data: {
                    publicacion : id
                },
                success: function(response) {
                    console.log(response);
                } 
        });
    },
    
    
    
    comentar: function(id) {
        var comentario = $("#comentario-" + id)
        if (comentario.val() != "") {

            $.ajax({
                url: 'publicacion/comentar',
                type: 'POST',
                async: true,
                data: {
                    usuario: 1,
                    comentario: comentar.val()
                },
                success: function(response) {
                    alert('se ejecuto correctamente');
                }
            });

        } else {
            alert('Este campo es obligatorio');
        }
    }
};
