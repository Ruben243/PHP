<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="Elija su fruta para ver sus nutrientes">
    <link rel="stylesheet" href="css/style.css">
    <title>Frutas</title>
</head>
    <body>
        <main class="main">
            <label for="names">Nombre de Fruta</label>
            <input list="names" type="text" id="input" name="fruta">
            <datalist id="names">
                <!-- Aqui se rellenan los nombres de frutas con el resultado de la consulta -->
            </datalist>
            <input type="submit" value="Enviar" onClick="getFruit()";>  <!--al hacer click en el boton se llama a la funcion-->
            <div class="insertarDatos">

            <div>

        </main>


    <?php
        $url='https://www.fruityvice.com/api/fruit/all'; //consulta a la api que traera todas las frutas

        $names=file_get_contents($url); //ejecutamos la consulta
    ?>

        <script>
            const nombres=<?php echo $names?>; //pasamos los datos dela consulta de php a una variable a javascript
            let html="";

            Object.entries(nombres).forEach(([key,nombre])=>{ //bucle que recorre los datos
                const {name}=nombre; //desconstructiring para extraer el campo deseado
                html+=`<option value=${name}>`; //creamos las opciones del datalist con el nombre d ela fruta

            });

            document.querySelector('#names').innerHTML=html; //añadimos el html creado al input


            function getFruit(){
            
                let fruta=document.querySelector('#input').value; // obtener valor de la fruta elegida
                
                let cc=document.querySelector(".insertarDatos");//  seleccionamos el div para añadir los datos
                
                ajax=nuevoAjax(); //  instanciamos un objeto AJAX
            
                let url="traerFruta.php?fruta="+fruta; //   crea la url con la variable
                ajax.open("GET",url,true); //pasamos el metodo y la url

                ajax.onreadystatechange=function(){
                    if (ajax.readyState==4) { //si la respuesta esta ok
                            cc.innerHTML=ajax.responseText; //añadimos la respuesta a al div
                        }
                    }
                    ajax.send();//enviamos

                }   
            
            //  NUEVO OBJETO AJAX
            function nuevoAjax(){
                var xmlhttp=false;
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (E) {
                        xmlhttp = false;
                    }
                }

                if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                    xmlhttp = new XMLHttpRequest();
                }
                return xmlhttp;
                }

        </script>
    </body>
</html>