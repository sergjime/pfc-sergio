window.onload = function() {

    // Usuario registrado con éxito
    function userRegister(){
        Swal.fire(
            'Usuario registrado',
            'Hemos enviado tu contraseña para iniciar sesión a tu email.',
            'success'
        )
    }

    // Inicia sesión con éxito
    function userLogin(){
        Swal.fire({
            position: 'top',
            type: 'success',
            title: 'Bienvenido, acabas de iniciar sesión',
            showConfirmButton: false,
            timer: 1500
        })
    }

    // No se pudo iniciar sesión
    function noIniciaSesion(){
        Swal.fire({
            type: 'error',
            title: 'No se pudo iniciar sesión',
            text: 'El usuario o la contraseña son incorrectos',
            showConfirmButton: false,
            timer: 3000
        })  
    }

    // Eliminar usuario o sitio
    function deleteUserSite(){
        Swal.fire({
            title: '¿Estás seguro de querer eliminar este usuario?',
            text: "Eliminarás este usuario de la base de datos",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Usuario eliminado',
                    'Este usuario ha sido eliminado de la base de datos con éxito',
                    'success'
                )
            }
        })
    }

/*    <input type="text" value="Hello World" id="myInput">
    <button onclick="myFunction()">Copy text</button>*/
    
    // Botón copiar texto
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        document.execCommand("copy");
    }
};