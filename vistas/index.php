<?php
require_once ('../controlador/controlador.php');


$a= new controlador();
$products=$a->obtenerEquipos();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../lib/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../lib/fonta/css/all.css" type="text/css" />
    <link href="../lib/css/mm_entertainment.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" language="javascript" src="../lib/js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="../lib/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="JavaScript" src="../lib/js/jquery.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row" style="margin-top: 10%; text-align: center;">
        <div class="col-sm-4">
            <button type="button" class="btn btn-lg" >
                <a href="equipo.php"> <i class="fas fa-users fa-5x"></i></a></button>

        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-lg" >
                <a href="partido.php"> <i class="fas fa-futbol fa-5x"></i></a></button>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-lg">
                <a href="disciplina.php"> <i class="fas fa-gamepad fa-5x"></i></a></button>
        </div>

    </div>
    <div class="row" style="text-align: center;">
        <div class="col-sm-4" >
            <a href="equipo.php"><b>EQUIPO</b></a>

        </div>
        <div class="col-sm-4">
                <a href="partido.php.php">PARTIDO</a>
        </div>

        <div class="col-sm-4">
            <a href="disciplina.php"><b>DISCIPLINA</b></a>

        </div>


</div>

    <div class="row" style="margin-top: 10%; text-align: center;">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-3">
            <button type="button" class="btn btn-lg" >
                <a href="actividad.php"> <i class="fas fa-futbol fa-5x"></i></a></button>
        </div>
        <div class="col-sm-3">
            <button type="button" class="btn btn-lg">
                <a href="medallero.php"><i class="fas fa-list-ol fa-5x"></i></a></button>
        </div>

        <div class="col-sm-3">
        </div>

    </div>
    <div class="row" style="text-align: center;">
        <div class="col-sm-3" >
        </div>
        <div class="col-sm-3">
            <a href="partido.php.php">ACTIVIDADES</a>
        </div>
        <div class="col-sm-3">
            <a href="medallero.php"><b>POSICIONES</b></a>
        </div>

        <div class="col-sm-3">
        </div>


    </div>



</body>
<script>
    $(document).ready( function () {

        $('#guardar').click( function () {
            var equipo= $('#fname').val();
            var caso="guardarEquipo";
            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: {'equipo':equipo, 'caso': caso},//capturo array
                success: function(data){
                    console.log(data);
                }
            });

        });
        $('.edit').click( function () {
            var pk_num_equipo = $(this).val();
            var caso="verEquipo";
            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: {'pk_num_equipo':pk_num_equipo, 'caso': caso},//capturo array
                success: function(data){
                    console.table(data['pk_num_equipo'])
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });        });

    });
</script>

