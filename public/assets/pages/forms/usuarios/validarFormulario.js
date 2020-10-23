const formulario = document.querySelector('#formularioRegistroUsuario');
const inputs     = document.querySelectorAll('#formularioRegistroUsuario input');

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const validarFormulario = (event) => {

    let nombre = event.target.name;

    switch (nombre) {

        case "nombre" : {

            if ( expresiones.nombre.test(event.target.value) ) {

            }else {
                document.getElementById('nombreUsuario').classList.add('input-danger');
            }

            break;
        }

        case "apellido" : {
            if ( expresiones.apellido.test(event.target.value) ) {

            }else {
                document.getElementById('apellidoUsuario').classList.add('input-danger');
            }
            break;
        }

        case "celular" : {

            break;
        }

        case "idRol" : {

            break;
        }

        case "email" : {

            break;
        }

        case "password" : {

            break;
        }

        case "password_confirmation" : {

            break;
        }

    }

}

inputs.forEach( (input) => {

    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);

} );

formulario.addEventListener("submit",(event) => {

    event.preventDefault();

});
