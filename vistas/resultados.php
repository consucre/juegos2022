<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
//require_once ('../controlador/controlador.php');


//$a= new controlador();
//$partidos = $a->obtenerPartidoEjecucion();

?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../lib/css/mm_entertainment.css" rel="stylesheet" type="text/css" />

    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../lib/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
    <link href="../lib/css/animated.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../lib/fonta/css/all.css" type="text/css" />

    <script type="text/javascript" language="javascript" src="../lib/js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="../lib/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="JavaScript" src="../lib/js/jquery.min.js"></script>
    <style type="text/css">
        img {
            width: 220px; height: 200px;
        }
    </style>
</head>

<body>
<div class="container " style="text-align: center;  align-items: center ; " id="result" >





</div>


</body>
<script>
    //var TimerId = setTimeout("ClosePage()",20*1000);
    function ClosePage()
    {
        clearTimeout(TimerId);
        self.close();
    }
    $(document).ready( function () {


        var caso = 'obtenerPartidoEjecucion';
        $.ajax({
            type: "POST",
            url: '../controlador/enrutador.php',
            data: {'caso': caso},//capturo array
            success: function(data){
                $('#result').html('     <div  class="row animated heartBeat" style="margin-top: 5%; text-align: center;"><div ><div class="col-sm-12"><h1  style="font-size: 40pt;">'+data.dato[0].ind_nombre_disciplina+'</h1><br/> <br/></div><div class="col-sm-5"><img src="../lib/imagenes/logos/'+data.dato[0].foto1+'" alt="'+data.dato[0].foto1+'"/><h1> '+data.dato[0].equipo1+'&nbsp; &nbsp;'+data.dato[0].num_puntos_equipo1+'</h1></div><div class="col-sm-2"> <h1>VS</h1></div><div class="col-sm-5"><img src="../lib/imagenes/logos/'+data.dato[0].foto2+'" alt="'+data.dato[0].foto2+'"/><h1>'+data.dato[0].equipo2+'&nbsp; &nbsp;'+data.dato[0].num_puntos_equipo2+' </h1></div></div></div>');
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    setInterval(function(){

        var caso = 'obtenerPartidoEjecucion';
        $.ajax({
            type: "POST",
            url: '../controlador/enrutador.php',
            data: {'caso': caso},//capturo array
            success: function(data){

                $('#result').html('     <div  class="row animated heartBeat" style="margin-top: 5%; text-align: center;"><div ><div style="font-size: 40pt;" class="col-sm-12"><h1>'+data.dato[0].ind_nombre_disciplina+'</h1><br/> <br/></div><div class="col-sm-5"><img src="../lib/imagenes/logos/'+data.dato[0].foto1+'" alt="'+data.dato[0].foto1+'"/><h1> '+data.dato[0].equipo1+'&nbsp; &nbsp;'+data.dato[0].num_puntos_equipo1+'</h1></div><div class="col-sm-2"> <h1>VS</h1></div><div class="col-sm-5"><img src="../lib/imagenes/logos/'+data.dato[0].foto2+'" alt="'+data.dato[0].foto2+'"/><h1>'+data.dato[0].equipo2+'&nbsp; &nbsp;'+data.dato[0].num_puntos_equipo2+' </h1></div></div></div>');
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        }); }, 2000);
    });

</script>
</html>
<?php
