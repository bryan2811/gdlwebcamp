$(document).ready(function () {
    
    $('#login-admin').on('submit', function(e) {
            
        // Con preventDefault se evita que se abra el archivo insertar-admin.php
        e.preventDefault();
        var datos = $(this).serializeArray(); // Itera en el form y crea objetos

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: datos,
            dataType: "json",
            success: function (data) {
                var resultado = data;
                if(resultado.respuesta == 'exitoso') {
                    Swal({
                        type: 'success',
                        title: 'Login Correcto',
                        text: 'Bienvenido(a) '+resultado.usuario+'!!'
                    });
                    setTimeout(function(){
                        window.location.href = 'admin-area.php'
                    }, 900);
                } else {
                    Swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Usuario o Password Incorrectos',
                    });
                }
            }
        });

    });

});