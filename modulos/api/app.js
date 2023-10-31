

var contenido = document.getElementById('contenido')

function Generar(){
    fetch("https://randomuser.me/api/")
    .then(data => data.json())
    .then(data => {

        console.log(data)

        var titulo =  data.results[0].name.title
        var nombre =  data.results[0].name.first
        var apellido =  data.results[0].name.last

        contenido.innerHTML += `
        <img class="img rounded-circle mt-5" src="${data.results[0].picture.large}" alt="">
        <p style="font-weight: bold;font-size:2rem">Nombre: ${titulo + " " + nombre + " " + apellido}</p>
        <p style="font-weight: bold;font-size:2rem">Correo: ${data.results[0].email}</p>
        <p style="font-weight: bold;font-size:2rem">Residencia: ${data.results[0].location.city + ", " + data.results[0].location.country} </p>
        `
    })
}

