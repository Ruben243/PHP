let pagina = 1;
const cita = {
    nombre: '',
    fecha: '',
    hora: '',
    servicios: []
}
document.addEventListener('DOMContentLoaded', iniciarApp);


function iniciarApp() {
    mostrarServicios();
    //Resalta el div actual segun el tab que se presiona
    mostrarSeccion();
    //oculta o muestra una seccion segun el tab que se presiona
    cambiarSeccion();

    //paginacion siguiente y anterior
    paginaSiguiente();
    paginaAnterior();

    //comprueba la pagina actual para ocultar o mostrar la paginacion
    botonesPaginador();

    //muestra el resumen de la cita o el mensaje de error
    mostrarResumen();


    //almacena el nombre de la cita en el objeto
    nombreCita();

    //almacena la fecha de la cita en el obejto
    fechaCita();

    //deshabilita fecha anterior del calendario
    deshabilitarFechaAnterior();

    //almacena la cita en el objeto
    horaCita();
}

function mostrarSeccion() {
    //eliminar mostar-seccion de la seccion anterior
    const seccionAnterior = document.querySelector('.mostrar-seccion');
    if (seccionAnterior) {
        seccionAnterior.classList.remove('mostrar-seccion');
    }
    const seccionActual = document.querySelector(`#paso-${pagina}`);
    seccionActual.classList.add('mostrar-seccion');
    //eliminar la clase actual en el tab anterior
    const tabAnterior = document.querySelector('.tabs .actual');
    if (tabAnterior) {
        tabAnterior.classList.remove('actual');
    }
    //resalta el tab actual
    const tab = document.querySelector(`[data-paso="${pagina}"]`);
    tab.classList.add('actual');
}

function cambiarSeccion() {
    const enlaces = document.querySelectorAll('.tabs button');

    enlaces.forEach(enlace => {
        enlace.addEventListener('click', e => {
            e.preventDefault();
            pagina = parseInt(e.target.dataset.paso);

            mostrarSeccion();
            botonesPaginador();

        })
    });
}

async function mostrarServicios() {
    try {
        const url="http://localhost:3000/servicios.php"
        const resultado = await fetch(url);
        const db = await resultado.json();

        //generar html
        db.forEach(servicio => {
            const { id, nombre, precio } = servicio;
            // DOM scripting
            //Generar nombre servicio
            const nombreservicio = document.createElement('P');
            nombreservicio.textContent = nombre;
            nombreservicio.classList.add('nombre-servicio');

            //precio servicio
            const precioservicio = document.createElement('P');
            precioservicio.textContent = `€ ${precio}`;
            precioservicio.classList.add('precio-servicio');

            //generar div contenedor servicio
            const servicioDiv = document.createElement('DIV');
            servicioDiv.classList.add('servicio');
            servicioDiv.dataset.idServicio = id;

            //Selecionar un servicio para la cita
            servicioDiv.onclick = seleccionarServicio;

            //inyectar precio y nombre al servicio div
            servicioDiv.appendChild(nombreservicio);
            servicioDiv.appendChild(precioservicio);

            //inyectar en el html
            document.querySelector('#servicios').appendChild(servicioDiv);

        });
    } catch (error) {
        console.warn(error);
    }
}

function seleccionarServicio(e) {

    let elemento;
    //forzar que el elemnto al hacer sea el DIv
    if (e.target.tagName === 'P') {
        elemento = e.target.parentElement

    } else {
        elemento = e.target;

    }


    if (elemento.classList.contains('seleccionado')) {
        elemento.classList.remove('seleccionado')
        const id = parseInt(elemento.dataset.idServicio)
        eliminarServicio(id);

    } else {
        elemento.classList.add('seleccionado');


        const servicioObj = {
            id: parseInt(elemento.dataset.idServicio),
            nombre: elemento.firstElementChild.textContent,
            precio: elemento.firstElementChild.nextElementSibling.textContent
        }

        agregarServicio(servicioObj);
    }

}

function paginaSiguiente() {
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', () => {
        pagina++;
        botonesPaginador();
    })

}


function paginaAnterior() {
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', () => {
        pagina--;
        botonesPaginador();
    })

}

function botonesPaginador() {
    const paginaSiguiente = document.querySelector('#siguiente');
    const paginaAnterior = document.querySelector('#anterior');

    if (pagina === 1) {
        paginaAnterior.classList.add('ocultar');
        if (paginaSiguiente.classList.contains('ocultar')) {
            paginaSiguiente.classList.remove('ocultar');

        }
    } else if (pagina === 3) {
        paginaSiguiente.classList.add('ocultar');

        if (paginaAnterior.classList.contains('ocultar')) {
            paginaAnterior.classList.remove('ocultar');

        }
        mostrarResumen(); //estamos en la pagina 3
    } else {

        if (paginaAnterior.classList.contains('ocultar')) {
            paginaAnterior.classList.remove('ocultar');

        }
        if (paginaSiguiente.classList.contains('ocultar')) {
            paginaSiguiente.classList.remove('ocultar');

        }
    }
    mostrarSeccion(); //cambia la seccion 

}

function mostrarResumen() {
    const { nombre, fecha, hora, servicios } = cita;
   
    


    //seleccionar el resumen
    const resumenDiv = document.querySelector('.contenido-resumen');
    //limpia el html previo
    while (resumenDiv.firstChild) {
        resumenDiv.removeChild(resumenDiv.firstChild);
    }
    //validacion del obejto
    if (Object.values(cita).includes('')) {
        const noServicios = document.createElement('P');
        noServicios.textContent = 'Rellene todos los campos del formulario para concertar su cita';

        noServicios.classList.add('invalidar-cita');


        //agregar a resumenDiv
        resumenDiv.appendChild(noServicios);

        //con un return aqui no hace falta un else
        return;
    }
    //mostrar resumen

    const headingCita = document.createElement('H3');
    headingCita.textContent = 'Resumen de Cita';

    const nombreCita = document.createElement('P');
    //innerHTML trata las etiquetas como html textContent como texto
    nombreCita.innerHTML = `<span>Nombre: </span>${nombre}`;

    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span>Fecha: </span>${fecha}`;

    const horaCita = document.createElement('P');
    horaCita.innerHTML = `<span>Hora: </span>${hora}`;

    const serviciosCita = document.createElement('DIV');
    serviciosCita.classList.add('resumen-servicios');

    const headingServicios = document.createElement('H3');
    headingServicios.textContent = 'Resumen de Servicios';

    let cantidad = 0;

    //iterar sobre el array de servicios
    servicios.forEach(servicio => {
        const { nombre, precio } = servicio;
        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicios');

        const textoServicio = document.createElement('P');
        textoServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.textContent = precio;
        precioServicio.classList.add('precio');

        const totalServicio = precio.split('€');
        cantidad += parseInt(totalServicio[1].trim());

        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);
        serviciosCita.appendChild(headingServicios);
        serviciosCita.appendChild(contenedorServicio);

    });
    resumenDiv.appendChild(headingCita)
    resumenDiv.appendChild(nombreCita);
    resumenDiv.appendChild(fechaCita);
    resumenDiv.appendChild(horaCita);
    resumenDiv.appendChild(serviciosCita);

    const cantidadPagar = document.createElement('P');
    cantidadPagar.innerHTML = `<span>Total a Pagar:</span> € ${cantidad}`;
    cantidadPagar.classList.add('total');
    resumenDiv.appendChild(cantidadPagar);

   setTimeout(() => {
       window.location.href=('../../index.html')
       alert('GRACIAS POR VER MI PROYECTO');
   }, 4000);

}

function agregarServicio(objServicio) {
    const { servicios } = cita;
    cita.servicios = [...servicios, objServicio];
    

}

function eliminarServicio(id) {
    const { servicios } = cita;

    cita.servicios = servicios.filter(servicio => servicio.id !== id);

}

function nombreCita() {
    const nombreInput = document.querySelector('#nombre');
    nombreInput.addEventListener('input', e => {
        const nombretexto = e.target.value.trim();

        //validacion de que nombre texto tenga algo
        if (nombretexto === '' || nombretexto.length < 3) {
            mostrarAlerta('Nombre no valido', 'error');
        } else {
            const alert = document.querySelector('.alerta');
            if (alert) {
                alert.remove();
            }
            cita.nombre = nombretexto;
        }
    })
}

function mostrarAlerta(mensaje, tipo) {
    //si hay una alerta previa no cear
    const alertaPrevia = document.querySelector('.alerta');
    if (alertaPrevia) {
        return;
    }
    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');

    if (tipo === 'error') {
        alerta.classList.add('error');
    }
    const formulario = document.querySelector('.formulario')
    formulario.appendChild(alerta);

    //eliminar despues de un tiempo
    setTimeout(() => {
        alerta.remove();
    }, 3000);
}

function fechaCita() {
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('input', e => {
        const dia = new Date(e.target.value).getUTCDay();

        if ([0, 6].includes(dia)) {
            e.preventDefault();
            fechaInput.value = '';
            mostrarAlerta('Fin de semana no validos', 'error');
        } else {
            cita.fecha = fechaInput.value;


        }
        //opciones para toLocaleDateString(es-ES,opciones)
        // const opciones={
        //     weekday:'long',
        //     year:'numeric',
        //     month:'long'
        // }

    })//fin de addeventlistener
}

function deshabilitarFechaAnterior() {
    const inputFecha = document.querySelector('#fecha');
    const fechaAhora = new Date();
    const year = fechaAhora.getFullYear();
    //nesesario para que funcione
    const mes = ('0' + (fechaAhora.getMonth() + 1)).slice(-2);
    const dia = fechaAhora.getDate() + 1;

    //formato deseado AAAA-MM-DD
    const fechaDeshabilitar = `${year}-${mes}-${dia}`;
    inputFecha.min = fechaDeshabilitar;

}

function horaCita() {
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input', e => {

        const horaCita = e.target.value;
        const hora = horaCita.split(':')
        if (hora[0] < 10 || hora[0] > 18) {
            setTimeout(() => {
                inputHora.value = '';
            }, 3000);

            mostrarAlerta('Hora no disponible', 'error');
        } else {
            cita.hora = horaCita;

        }
    })
}