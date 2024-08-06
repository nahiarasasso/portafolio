document.addEventListener('DOMContentLoaded', function() {
    var formulario = document.querySelector('form');
    var comentariosContainer = document.getElementById('comentarios');
    var comentariosGuardados = JSON.parse(localStorage.getItem('comentarios')) || [];


    // Función para cargar comentarios guardados
    function cargarComentariosGuardados() {
        for (var i = 0; i < comentariosGuardados.length; i++) {
            var comentarioDiv = document.createElement('div');
            comentarioDiv.classList.add('comentario');
            comentarioDiv.innerHTML = comentariosGuardados[i];
            comentariosContainer.appendChild(comentarioDiv);
        }
    }


    // Cargar comentarios guardados al cargar la página
    cargarComentariosGuardados();


    formulario.addEventListener('submit', function(event) {
        event.preventDefault();


        var nombre = document.getElementById('nombre').value;
        var libro = document.getElementById('opciones').value;
        var comentario = document.getElementById('comentario').value;


        // Construir el contenido del comentario
        var comentarioHTML = '<strong>' + nombre + ':</strong> ' + libro + '<br>' + comentario;


        // Agregar el comentario a la lista y al arreglo de comentarios guardados
        var comentarioDiv = document.createElement('div');
        comentarioDiv.classList.add('comentario');
        comentarioDiv.innerHTML = comentarioHTML;
        comentariosContainer.appendChild(comentarioDiv);
        comentariosGuardados.push(comentarioHTML);


        // Guardar los comentarios en el almacenamiento local
        localStorage.setItem('comentarios', JSON.stringify(comentariosGuardados));


        // Limpiar el formulario
        formulario.reset();
    });
});

