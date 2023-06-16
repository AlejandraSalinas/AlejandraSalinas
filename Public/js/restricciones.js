// // Obtener referencia al formulario
// var crear_usuario = document.getElementById('crear_usuario');

// // Agregar evento de envío del crear_usuario
// crear_usuario.addEventListener('submit', function(event) {
//   event.preventDefault(); // Evitar que se envíe el crear_usuario de manera automática

//   var id_persona = document.getElementById('id_persona').value;
//   var inicio_contrato = document.getElementById('inicio_contrato').value;
//   var fin_contrato = document.getElementById('fin_contrato').value;
//   var pass = document.getElementById('pass').value;
//   var estado = document.getElementById('estado').value;


//   // Verificar si el usuario ya existe
//   if (usuarioExiste(id_persona)) {
//     alert('El usuario ya existe en la base de datos.');
//   } else {
//     // Guardar el usuario
//     guardarUsuario(id_persona, inicio_contrato, fin_contrato, pass, estado);
//     alert('Usuario agregado correctamente.');
//   }

//   // Limpiar el crear_usuario
//   crear_usuario.reset();
// });

// // // Función para verificar si el usuario ya existe
// // function usuarioExiste(email) {
// //   // Aquí puedes agregar tu lógica para verificar si el usuario existe en la base de datos
// //   // Puedes hacer una petición a un servidor, consultar una API, etc.
// //   // En este ejemplo, siempre asumiremos que el usuario no existe
// //   return false;
// // }

// // // Función para guardar el usuario
// // function guardarUsuario(nombre, email) {
// //   // Aquí puedes agregar tu lógica para guardar el usuario en la base de datos
// //   // Puedes hacer una petición a un servidor, enviar los datos a una API, etc.
// //   // En este ejemplo, simplemente mostramos los datos en la consola
// //   console.log('Nombre:', nombre);
// //   console.log('Email:', email);
// // }

document.addEventListener("DOMContentLoaded", () => {
  var btn_editar = document.getElementById("btn_editar");
  btn_editar.hidden = true;
});

function show(id_turno) {
  var btn_editar = document.getElementById("btn_guardar");
  btn_editar.hidden = true;

  var btn_editar = document.getElementById("btn_editar");
  btn_editar.hidden = false;

  let elemento = document.getElementById(`turno${id_turno}`);
  let documento = elemento.textContent

  document.getElementById('fecha').value = documento
  document.getElementById('fecha').setAttribute('data-id', id_turno);
}

function editar() {

  let elemento = document.getElementById("fecha");
  let id_sexo = elemento.dataset.id
  let nombre = elemento.value

  axios.post(`../../controllers/TurnosController.php?c=3&id_turno=${id_turno}&fecha=${fecha}`)
    .then(function(response) {
        window.location.reload();
        document.getElementById('fecha').focus();
    })
    .catch(function(error) {
        console.error(error);
    });
}

function borrar(){
    var btn_editar = document.getElementById("btn_guardar");
    btn_editar.hidden = false;

    var btn_editar = document.getElementById("btn_editar");
    btn_editar.hidden = true;

    document.getElementById('nombre').removeAttribute('data-id');

    document.getElementById('nombre').value = "";
    document.getElementById('nombre').focus();
}