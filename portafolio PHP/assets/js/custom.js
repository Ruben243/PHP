function señal(seña = "all") {
    const all1 = document.getElementById("all2");
    const nodejs1 = document.getElementById("nodejs2");
    const css1 = document.getElementById("css2");
    const javascript1 = document.getElementById("javascript2");


    switch (seña) {

        case "nodejs":
            nodejs1.classList.add("sombreado");
            console.log(nodejs1);
            all1.classList.remove("sombreado");
            css1.classList.remove("sombreado");
            javascript1.classList.remove("sombreado");
            break;
        case "css":
            css1.classList.add("sombreado");
            nodejs1.classList.remove("sombreado");
            all1.classList.remove("sombreado");
            javascript1.classList.remove("sombreado");
            break;

        case "javascript":
            javascript1.classList.add("sombreado");
            css1.classList.remove("sombreado");
            nodejs1.classList.remove("sombreado");
            all1.classList.remove("sombreado");
            break;

        default:
            all1.classList.add("sombreado");
            console.log(all1);
            nodejs1.classList.remove("sombreado");
            css1.classList.remove("sombreado");
            javascript1.classList.remove("sombreado");

    }


}

function filtcat(recibido) {
    const nodejs = document.querySelectorAll(".nodejs")
    const javascript = document.querySelectorAll(".javascript");
    const css = document.querySelectorAll(".css")


    if (recibido == "nodejs") {
        señal("nodejs")
            // muestra de nuevo el elemento por si habia sido ocultado antes
        nodejs.forEach(element => {
            element.style.display = "inline"
        });
        // oculta los elementos
        javascript.forEach(element => {
            element.style.display = "none";
        });
        css.forEach(element => {
            element.style.display = "none";
        });


    }
    if (recibido == "css") {
        señal("css")
            // muestra de nuevo el elemento por si habia sido ocultado antes

        css.forEach(element => {
            element.style.display = "inline";
        });


        javascript.forEach(element => {
            element.style.display = "none";
        });
        nodejs.forEach(element => {
            element.style.display = "none"
        });


    }

    if (recibido == "javascript") {
        señal("javascript")
        javascript.forEach(element => {
            element.style.display = "inline";
        });
        nodejs.forEach(element => {
            element.style.display = "none"
        });
        css.forEach(element => {
            element.style.display = "none";
        });
    }

    if (recibido == "all") {
        señal("")
        javascript.forEach(element => {
            element.style.display = "inline";
        });
        css.forEach(element => {
            element.style.display = "inline";
        });
        nodejs.forEach(element => {
            element.style.display = "inline"
        });


    }

}

function mostrar() {
    const nav = document.getElementById('menu');

    if (nav.classList.contains("open")) {
        nav.classList.remove('open');

    } else {
        nav.classList.add('open');

    }


}