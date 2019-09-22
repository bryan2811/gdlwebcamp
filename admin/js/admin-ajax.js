$(document).ready(function () {
    
    $('#guardar-registro').on('submit', function(e) {
        
        // Con preventDefault se evita que se abra el archivo insertar-admin.php
        e.preventDefault();
        var datos = $(this).serializeArray(); // Itera en el form y crea objetos (serializeArray Guarda todo en un arreglo)

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: datos,
            dataType: "json",
            success: function (data) {
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito') {
                    Swal({
                        type: 'success',
                        title: 'Correcto',
                        text: 'Se guardó correctamente',
                      });
                } else {
                    Swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Hubo un error',
                      });
                }
            }
        });

    });

    // Se ejecuta cuando hay un archivo
    $('#guardar-registro-archivo').on('submit', function(e) {
        
        // Con preventDefault se evita que se abra el archivo insertar-admin.php
        e.preventDefault();
        var datos = new FormData(this); // Crea un objeto de formdata en el que le da una llave y un valor a cada uno de los campos

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: datos,
            dataType: "json",
            contentType: false, // Necesario
            processData: false, // Necesario
            async: true, // Necesario
            cache: false, // Necesario
            success: function (data) {
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito') {
                    Swal({
                        type: 'success',
                        title: 'Correcto',
                        text: 'Se guardó correctamente',
                      });
                } else {
                    Swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Hubo un error',
                      });
                }
            }
        });

    });

    // Eliminar un registro
    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();

        const id = $(this).attr('data-id');
        const tipo = $(this).attr('data-tipo');

        swal({
            title: '¿Estás Seguro?',
            text: 'Un registro eliminado no se puede recuperar.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
            $.ajax({
                        type:'post',
                        data: {
                            'id': id,
                            'registro': 'eliminar'
                        },
                        url: 'modelo-'+tipo+'.php',
                        success: function(data){
                            console.log(data);
                            const resultado = JSON.parse(data);
                            if(resultado.respuesta == 'exito'){
                                swal(
                                    'Eliminado!',
                                    'Registro Eliminado',
                                    'success'
                                )
                                jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                            }                       
                        }
                    })
            } else if (result.dismiss === 'cancel') {
              swal(
                'Cancelado',
                'No se eliminó el registro',
                'error'
              )
            }
          })

        })


});