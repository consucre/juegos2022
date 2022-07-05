
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
    <!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
    <title>III JUEGOS ORIENTALES DE PLAYA SUCRE 2020</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="lib/css/mm_entertainment.css" type="text/css" />
    <link rel="stylesheet" href="lib/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="lib/fonta/css/all.css" type="text/css" />

    <script type="text/javascript" language="javascript" src="lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="lib/js/jscript.js"></script>
    <script type="text/javascript" language="javascript" src="lib/js/jquery-2.1.1.min.js"></script>
</head>
<body >

<div id="contenedor">

    <div class="col-sm-12 bordeTablaBanner">

        <video width="1080" height="620" controls autoplay loop>
            <source src="video.mp4" type="video/mp4">
        </video>
    </div>
</div>

<br />
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="text-center ">

            <button type="button" class="btn btn-link btn-lg">
                <a href="vistas/partido2.php" target="popup" onClick="window.open(this.href, this.target, 'width=1200px,height=600px'); return false;">
                    <i class="fas fa-users"></i></a></button>
            <button type="button" class="btn btn-link btn-lg">
                <a href="vistas/medallero2.php" target="popup" onClick="window.open(this.href, this.target, 'width=1200px,height=600px'); return false;">
                    <i class="fas fa-list-ol"></i></a></button>
            <button type="button" class="btn btn-link btn-lg">
                <a href="vistas/resultados.php" target="popup" onClick="window.open(this.href, this.target, 'width=1200px,height=600px'); return false;">
                    <i class="fas fa-futbol"></i></a></button>

        </div>
        <!-- Copyright -->
        <div class="cronometro">
            <div id="hms"></div>
            <div class="boton start"></div>
            <div class="boton stop"></div>
            <div class="boton reiniciar"></div>
        </div>
        <div id="cintillo">

        </div>

    </footer>
</body>
<script>
    $(document).ready( function () {
       var momentoActual = new Date();
        var hora = momentoActual.getHours();
       var  minuto = momentoActual.getMinutes();
         var segundo = momentoActual.getSeconds();
         if (hora < 10){
             hora ="0"+hora;
         }
        if (minuto < 10){
            minuto ="0"+minuto;
        }
         var  horaImprimible = hora +":"+ minuto + ":" + segundo;
        var caso="listaActividades";
            $.ajax({
                type: "POST",
                url: './controlador/enrutador.php',
                data: {'hora': horaImprimible,'caso': caso},//capturo array
                success: function(data){
                    console.log(data.dato);
                    $('#cintillo').html(' <marquee bgcolor="#EEE" width="100%" scrolldelay="100" scrollamount="8" direction="left" loop="infinite" style="font-size: 14pt; padding-top: 15px; padding-bottom: 15px;    bottom:0px; position: absolute;"> <b> III Juegos Orientales de Playa. Sucre 2020. &nbsp;&nbsp;&nbsp; Cronograma:   '+data.dato+'</b></marquee>');
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });


        setInterval(function(){ var momentoActual = new Date();
            var hora = momentoActual.getHours();
            var  minuto = momentoActual.getMinutes();
            var segundo = momentoActual.getSeconds();
            if (hora < 10){
                hora ="0"+hora;
            }
            if (minuto < 10){
                minuto ="0"+minuto;
            }
            var  horaImprimible = hora +":"+ minuto + ":" + segundo;
            var caso="listaActividades";
            $.ajax({
                type: "POST",
                url: './controlador/enrutador.php',
                data: {'hora': horaImprimible,'caso': caso},//capturo array
                success: function(data){
                    console.log(data.dato);
                    $('#cintillo').html(' <marquee bgcolor="#EEE" width="100%" scrolldelay="100" scrollamount="8" direction="left" loop="infinite" style="font-size: 14pt; padding-top: 15px; padding-bottom: 15px;    bottom:0px;position: fixed;"> <b> III Juegos Orientales de Playa. Sucre 2020. &nbsp;&nbsp;&nbsp; Cronograma:   '+data.dato+'</b></marquee>');
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            }); }, 600000);
    });

    window.onload = init;
    function init(){
        document.querySelector(".start").addEventListener("click",cronometrar);
        document.querySelector(".stop").addEventListener("click",parar);
        document.querySelector(".reiniciar").addEventListener("click",reiniciar);
        h = 0;
        m = 0;
        s = 0;
        document.getElementById("hms").innerHTML="00:00:00";
    }
    function cronometrar(){
        escribir();
        id = setInterval(escribir,1000);
        document.querySelector(".start").removeEventListener("click",cronometrar);
    }
    function escribir(){
        var hAux, mAux, sAux;
        s++;
        if (s>59){m++;s=0;}
        if (m>59){h++;m=0;}
        if (h>24){h=0;}

        if (s<10){sAux="0"+s;}else{sAux=s;}
        if (m<10){mAux="0"+m;}else{mAux=m;}
        if (h<10){hAux="0"+h;}else{hAux=h;}

        document.getElementById("hms").innerHTML = hAux + ":" + mAux + ":" + sAux;
    }
    function parar(){
        clearInterval(id);
        document.querySelector(".start").addEventListener("click",cronometrar);

    }
    function reiniciar(){
        clearInterval(id);
        document.getElementById("hms").innerHTML="00:00:00";
        h=0;m=0;s=0;
        document.querySelector(".start").addEventListener("click",cronometrar);
    }
   </script>
</html>
