"use strict"

/** VUE (como smarty pero client-side) 
const app = new Vue({
    el: "#app",
    data: {
        comments: [], //se usa como un assign de smarty
    },
}); 
*/

document.addEventListener('DOMContentLoaded', e => {



    getAll();

    //getComment(id);
    //deleteComment(50);
    if (document.querySelector('#form-comentario') != null) {
        document.querySelector('#form-comentario').addEventListener('submit', e => {
            e.preventDefault();
            addComment(id);
        });
    }


});

async function getAll() {
    try {
        let id = window.location.pathname.substr(window.location.pathname.lastIndexOf('/') + 1);
        const url = 'api/comentarios';
        const response = await fetch(url + "/" + id);
        const comentarios = await response.json();

        //llamo a la funcion que muestra las tareas
        showComentarios(comentarios);
        //ahora los muestro x vue
        //app.comments = comentarios;

    } catch (e) {
        console.log(e);
    }
}

async function getComment(id) {
    try {
        const url = 'api/comentarios';
        const response = await fetch(url + "/" + id);
        const comentario = await response.json();

        //llamo a la funcion que muestra las tareas
        //showComentarios(comentarios);
        //ahora los muestro x vue
        //app.comments = comentario;

    } catch (e) {
        console.log(e);
    }
}

function showComentarios(comentarios) {
    const container = document.querySelector("#comentarios");
    container.innerHTML = '';

    for (let comentario of comentarios) {
        container.innerHTML += `<li> ${comentario.texto} - ${comentario.calificacion} - <button class="eliminar" data-id="${comentario.id}" >ELIMINAR</button> </li>`;
    }

    document.querySelectorAll(".eliminar").forEach(boton => {
        boton.addEventListener('click', e => {
            e.preventDefault();
            let id = boton.getAttribute("data-id");
            deleteComment(id);

        })


    })
}


async function addComment(id) {
    //armo el comentario en un json
    let comentario = {
        texto: document.querySelector("#texto").value,
        calificacion: document.querySelector('input[name=inlineRadioOptions]:checked').value,
        id_tour: id
    }

    try {
        const response = await fetch('api/comentarios', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(comentario)
        });

        const c = await response.json();

        console.log(c);
        //llamo para traer los comentarios con el nuevo insertado
        getAll(id);
        //pusheo el comentario al arreglo de vue
        //app.comments.push(c);

    } catch (e) {
        console.log(e);
    }
}

async function deleteComment(id) {
    //armo el comentario en un json
    //let comentario = getComment(id);

    try {
        const url = 'api/comentarios'
        let response = await fetch(url + "/" + id, {
            method: 'DELETE',

        });

        const c = await response.json();

        console.log(c);
        //llamo para traer los comentarios con el nuevo insertado
        getAll();
        //pusheo el comentario al arreglo de vue
        //app.comments.push(c); //VER

    } catch (e) {
        console.log(e);
    }
}


///////////////////////////////////////////
/*
async function borrarEvento(id) { //busco el evento que quiero borrar atraves del id
    let URLborrar = URL + "/" + id;
    let respuesta = await fetch(URLborrar, {
        "method": "delete"
    });
    obtenerDelUrl();
}
async function obtenerDelUrl() { //me traigo los datos
    let peticion = await fetch(URL);
    peticion = await peticion.json(); //aca convierto mi objeto(respuesta de la peticion), en objeto(json) 
    actualizar(peticion.conciertos);
}
*/