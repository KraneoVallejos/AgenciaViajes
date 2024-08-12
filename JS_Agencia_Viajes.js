document.addEventListener("DOMContentLoaded", (event) => {
    let boton = document.getElementById("boton");
    let calendario = document.createElement("input");
    calendario.type = "date";
    calendario.id = "calendario";
    let botonEnviar = document.createElement("button");
    botonEnviar.textContent = "confirmar";
    let colorComent = document.getElementById("comentario");


    boton.addEventListener("click", function () {


        let body = document.getElementById("cuerpo");
        let header = document.getElementById("cabecera");
        let contenedor = document.querySelector(".formulario");
        let destino = document.getElementById("destino");
        let mensaje = document.getElementById("parrafo");
        mensaje.textContent = " SELECCIONE FECHA DE VIAJE";

        try {
            let destinoSel = destino.value;

            switch (destinoSel) {
                case "argentina":
                    body.style.backgroundImage = "url('https://media.iatiseguros.com/wp-content/uploads/2019/04/04011131/que-ver-argentina-4.jpg')";
                    colorComent.style.color = "white";
                    header.style.color = "lightyellow";
                    header.textContent = "ARGENTINA";
                    if (!document.getElementById("fechaArg")) {
                        mensaje.style.backgroundColor = "lightblue";
                        mensaje.style.color = "black";
                        botonEnviar.onclick = function () {
                            let fechaSel = calendario.value;  //obtener FECHA SELECCIONADA
                            mensaje.textContent = " DESTINO : ARGENTINA : FECHA SELECCIONADA: " + fechaSel;
                            calendario.setAttribute("id", "fechaArg");
                        }
                    } else {
                        mensaje.style.backgroundColor = "lightblue";
                        mensaje.textContent = " SELECCIONE UNA FECHA O CAMBIE EL DESTINO ";
                        mensaje.style.color = "black";
                        break;
                    }
                    break;


                case "bolivia":
                    body.style.backgroundImage = "url('https://unifranz.edu.bo/wp-content/uploads/2024/01/pink-flamingoes-in-bolivia-2021-08-26-22-29-43-utc-medium-1250-834-1024x683.jpg')";
                    colorComent.style.color = "yellow";
                    let header2 = document.getElementById("cabecera");
                    header2.style.color = "darkred";
                    header2.textContent = "BOLIVIA";
                    if (!document.getElementById("fechaBol")) {
                        mensaje.style.backgroundColor = "darkblue";
                        mensaje.style.color = "yellow";
                        botonEnviar.onclick = function () {
                            let fechaSel = calendario.value;  //obtener FECHA SELECCIONADA
                            mensaje.textContent = " DESTINO : BOLIVIA : FECHA SELECCIONADA: " + fechaSel;
                            calendario.setAttribute("id", "fechaBol");
                        }
                    } else {
                        mensaje.style.backgroundColor = "darkblue";
                        mensaje.textContent = " SELECCIONE UNA FECHA O CAMBIE EL DESTINO ";
                        mensaje.style.color = "yellow";
                        break;
                    }
                    break;


                case "colombia":
                    body.style.backgroundImage = "url('https://media.iatiseguros.com/wp-content/uploads/2018/03/04005252/es-seguro-viajar-a-colombia-3.jpg')";
                    colorComent.style.color = "darkblue";
                    let header3 = document.getElementById("cabecera");
                    header3.style.color = "yellow";
                    header3.textContent = "COLOMBIA";
                    if (!document.getElementById("fechaClmb")) {
                        mensaje.style.backgroundColor = "red";
                        mensaje.style.color = "white";
                        botonEnviar.onclick = function () {
                            let fechaSel = calendario.value;  //obtener FECHA SELECCIONADA
                            mensaje.textContent = " DESTINO : COLOMBIA : FECHA SELECCIONADA: " + fechaSel;
                            calendario.setAttribute("id", "fechaClmb");
                        }
                    } else {
                        mensaje.textContent = " SELECCIONE UNA FECHA O CAMBIE EL DESTINO ";
                        mensaje.style.color = "white";
                        mensaje.style.backgroundColor = "red";
                        break;
                    }
                    break;


                case "brasil":
                    body.style.backgroundImage = "url('https://cdn1.intriper.com/wp-content/uploads/2017/08/15130440/playas-del-nordeste-de-brasil.jpg')";
                    colorComent.style.color = "darkblue";
                    let header4 = document.getElementById("cabecera");
                    header4.style.color = "yellow";
                    header4.textContent = "BRASIL";
                    if (!document.getElementById("fechaBrsl")) {
                        mensaje.style.backgroundColor = "darkgreen";
                        mensaje.style.color = "yellow";
                        botonEnviar.onclick = function () {
                            let fechaSel = calendario.value;  //obtener FECHA SELECCIONADA
                            mensaje.textContent = " DESTINO : BRASIL : FECHA SELECCIONADA: " + fechaSel;
                            calendario.setAttribute("id", "fechaBrsl");
                        }
                    } else {
                        mensaje.textContent = " SELECCIONE UNA FECHA O CAMBIE EL DESTINO ";
                        mensaje.style.color = "yellow";
                        mensaje.style.backgroundColor = "darkgreen";
                        break;
                    }
                    break;


                default: body.style.backgroundImage = "url('https://www.derechoenzapatillas.com/wp-content/uploads/2017/06/agencia-de-viajes-publicidad-enga%C3%B1osa.jpg')";
                    break;

            }
        }
        catch (error) {
            console.error("Error: ", error);
        }
        contenedor.appendChild(botonEnviar);
        contenedor.appendChild(calendario);
    });


});


/*let contenedor = document.querySelector(".formulario");
let img = document.createElement("img");
img.src = "https://st.depositphotos.com/1008008/3377/i/450/depositphotos_33779797-stock-photo-woman-on-the-tropical-beach.jpg";
contenedor.appendChild(img);

let contenedor2 = document.querySelector(".formulario");
let img2 = document.createElement("img");
img2.src = "https://www.derechoenzapatillas.com/wp-content/uploads/2017/06/agencia-de-viajes-publicidad-enga%C3%B1osa.jpg";
contenedor.appendChild(img2);
*/
