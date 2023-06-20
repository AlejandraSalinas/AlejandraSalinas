// document.addEventListener("DOMContentLoaded", () => {
//     var btn_editar = document.getElementById("btn_editar");
//     btn_editar.hidden = true;
// });

// function show(id_sexo) {
//     var btn_editar = document.getElementById("btn_guardar");
//     btn_editar.hidden = true;

//     var btn_editar = document.getElementById("btn_editar");
//     btn_editar.hidden = false;

//     let elemento = document.getElementById(`sexo${id_sexo}`);
//     let documento = elemento.textContent

//     document.getElementById('nombre').value = documento
//     document.getElementById('nombre').setAttribute('data-id', id_sexo);
// }

// function editar() {

//     let elemento = document.getElementById("nombre");
//     let id_sexo = elemento.dataset.id
//     let nombre = elemento.value

//     axios.post(`../../controllers/SexoController.php?c=3&id_sexo=${id_sexo}&nombre=${nombre}`)
//         .then(function(response) {
//             window.location.reload();
//             document.getElementById('nombre').focus();
//         })
//         .catch(function(error) {
//             console.error(error);
//         });
// }

// function borrar(){
//     var btn_editar = document.getElementById("btn_guardar");
//     btn_editar.hidden = false;

//     var btn_editar = document.getElementById("btn_editar");
//     btn_editar.hidden = true;

//     document.getElementById('nombre').removeAttribute('data-id');

//     document.getElementById('nombre').value = "";
//     document.getElementById('nombre').focus();
// }