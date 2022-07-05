<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once ('../controlador/controlador.php');


$a= new controlador();
$partidos = $a->obtenerPartidos();
$equipos=$a->obtenerEquipos();

$dis=$a->obtenerDisciplinas();
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
    <div class="row"></div>
    <div class="row" style="margin-top: 5%; text-align: right;"><a href="index.php">Volver</a> </div>

    <div class="row ">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto table" id="table" style="margin-top: 10%;">
            <table class="table table-bordered table-hovered table-striped" id="productTable">
                <thead>
                <th style="width: 70%;"> Partido  </th>
                <th style="width: 10%;"> Modificar </th>
                <th style="width: 10%;"> Marcador </th>
                </thead>

                <tbody>

                <?php
                foreach($partidos as $product) : ?>

                    <tr>
                        <td> <?php echo $product['ind_partido']; ?> </td>
                        <td> <button type="button" class="edit" VALUE="<?php echo $product['pk_num_partida']; ?>" class="btn btn-link btn-lg"  data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-edit"></i></button>
                        </td>
                        <td>


                            <?php
                            if ($product['num_estatus']==1 ) {
                                echo    "<button type='button' class='marcador'  VALUE='".$product['pk_num_partida']."' class='btn btn-link btn-lg'  data-toggle='modal' data-target='#exampleModal2'><i class='fas fa-flag-checkered'></i></button> ";

                            }else{
                                echo    "<button type='button' class='marcador' disabled VALUE='".$product['pk_num_partida']."' class='btn btn-link btn-lg'  data-toggle='modal' data-target='#exampleModal2'><i class='fas fa-flag-checkered'></i></button> ";


                            }
                            ?>
                        </td>

                    </tr>


                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">

                <button type="button" id="nuevo"  class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Nuevo Equipo</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">

                        <div class="row ">
                            <div class="form col-md-12 " id="form" ">

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <input type="hidden" name="pk_num_partido" id="pk_num_partido">
                                        <select id="fk_num_disciplina"  name="fk_num_disciplina">
                                            <?php
                                            foreach($dis as $product) : ?>
                                                <option dato="<?php echo $product['ind_nombre_disciplina']; ?>" value="<?php echo $product['pk_num_disciplina']; ?>"><?php echo $product['ind_nombre_disciplina']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                        <select id="ind_partida"  name="ind_partida">
                                            <option value="SEMIFINAL">SEMIFINAL</option>
                                            <option value="FINAL">FINAL</option>
                                        </select>
                                    </div>
                                </div>
                                <br />
                                <br />

                                <div class="col-md-12">
                                </div>
                                <div class="col-md-12">

                                    <div class="col-md-4">
                                        <select id="fk_num_equipo1" name="fk_num_equipo1">
                                            <?php
                                            foreach($equipos as $product) : ?>
                                                <option equipo1="<?php echo $product['ind_nombre_equipo']; ?>"  value="<?php echo $product['pk_num_equipo']; ?>"><?php echo $product['ind_nombre_equipo']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="class="btn btn-link btn-lg">Vs</button>
                                    </div>

                                    <div class="col-md-4">
                                        <select id="fk_num_equipo2" name="fk_num_equipo2">
                                            <?php
                                            foreach($equipos as $product) : ?>
                                                <option dato3="<?php echo $product['ind_nombre_equipo']; ?>" value="<?php echo $product['pk_num_equipo']; ?>"><?php echo $product['ind_nombre_equipo']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="guardar" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">

                    <div class="row ">
                        <div class="form col-md-12 " id="form" ">

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <input type="hidden" name="pk_num_partido" id="pk_num_partido_">
                                    <select id="fk_num_disciplina_"  name="fk_num_disciplina">
                                        <?php
                                        foreach($dis as $product) : ?>
                                            <option dato="<?php echo $product['ind_nombre_disciplina']; ?>" value="<?php echo $product['pk_num_disciplina']; ?>"><?php echo $product['ind_nombre_disciplina']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div> <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <select id="ind_partida_"  name="ind_partida_">
                                        <option value="SEMIFINAL">SEMIFINAL</option>
                                        <option value="FINAL">FINAL</option>
                                    </select>
                                </div>
                                <div style="text-align: right;" class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="num_estatus" class="form-check-input"> Finalizado</label>
                                </div>
                            </div>

                            <br />
                            <br />

                            <div class="col-md-12">
                            </div>
                            <div class="col-md-12">

                                <div class="col-md-4">
                                    <select id="fk_num_equipo1_" class="custom-select mb-2 mr-sm-2 mb-sm-0" name="fk_num_equipo1_">
                                        <?php
                                        foreach($equipos as $product) : ?>
                                            <option equipo1="<?php echo $product['ind_nombre_equipo']; ?>"  value="<?php echo $product['pk_num_equipo']; ?>"><?php echo $product['ind_nombre_equipo']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="class="btn btn-link btn-lg">Vs</button>
                                </div>

                                <div class="col-md-4">
                                    <select id="fk_num_equipo2_" class="custom-select mb-2 mr-sm-2 mb-sm-0" name="fk_num_equipo2">
                                        <?php
                                        foreach($equipos as $product) : ?>
                                            <option dato3="<?php echo $product['ind_nombre_equipo']; ?>" value="<?php echo $product['pk_num_equipo']; ?>"><?php echo $product['ind_nombre_equipo']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>          <div class="col-md-12">

                                <div class="col-md-4">
                                    <input type="number" id="num_puntos_equipo1" name="num_puntos_equipo1" min="0">

                                </div>
                                <div class="col-md-2">

                                </div>

                                <div class="col-md-4">
                                    <input type="number" id="num_puntos_equipo2" name="num_puntos_equipo2" min="0">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="tantos" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>


</div>
</body>
<script>
    $(document).ready( function () {
        var partida;

        function dato(){ // recibimos por parametro el elemento select
            // obtenemos la opción seleccionada .
            var dis = $('option:selected').attr('dato');
            var e1 = $('option:selected').attr('equipo1');
            var e2 = $('option:selected').attr('dato3');
             partida= dis+" "+e1+" Vs "+e2;
        }
        $('#nuevo').click( function () {
           $('#pk_num_partido').val('');

        });

        $('#guardar').click( function () {
            dato();
            var pk_num_partido= $('#pk_num_partido').val();
            var equipo1= $('#fk_num_equipo1').val();
            var info = $('#ind_partida').val();
            var equipo2= $('#fk_num_equipo2').val();
            var disciplina= $('#fk_num_disciplina').val();
            if (equipo1==equipo2){
                alert("Los Equipos seleccionados son los mismos");
                $('#fk_num_equipo1').val('');
                $('#fk_num_equipo2').val('');
            }else {
            if (pk_num_partido!=""){
                var caso="editarPartido";
                var dat = {'pk_num_partido':pk_num_partido,'ind_partida':info, 'fk_num_disciplina': disciplina,'fk_num_equipo1': equipo1, 'fk_num_equipo2': equipo2, 'caso': caso};
            }else{
                var caso="guardarPartido";
                var dat = {'ind_partida':info, 'fk_num_disciplina': disciplina,'fk_num_equipo1': equipo1, 'fk_num_equipo2': equipo2, 'caso': caso};
            }


                $.ajax({
                    type: "POST",
                    url: '../controlador/enrutador.php',
                    data: dat,//capturo array
                    success: function (data) {
                        if(data.estatus=="ok"){
                            alert("Almacenado Exitosamente");
                            location.reload();
                        }else{
                            alert("Fallo la operacion");

                        }                    }
                });
            }
        });
        $('.edit').click( function () {
            var pk_num_equipo = $(this).val();
            var caso="verPartido";
            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: {'pk_num_equipo':pk_num_equipo, 'caso': caso},//capturo array
                success: function(data){
                    if(data.estatus=="ok"){
                        var pk_num_partido= $('#pk_num_partido').val(data.dato.pk_num_partida);
                        var fk_num_equipo1= $('#fk_num_equipo1').val(data.dato.fk_num_equipo1);
                        var fk_num_equipo2= $('#fk_num_equipo2').val(data.dato.fk_num_equipo2);
                        var fk_num_disciplina= $('#fk_num_disciplina').val(data.dato.fk_num_disciplina);
                        var info = $('#ind_partida').val(data.dato.ind_partida);

                    }else{
                        alert("Fallo la operacion");

                    }                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });        });

        $('.marcador').click(function () {

            var pk_num_equipo = $(this).val();
            var caso="verPartido";
            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: {'pk_num_equipo':pk_num_equipo, 'caso': caso},//capturo array
                success: function(data){
                    if(data.estatus=="ok"){
                        var pk_num_partido= $('#pk_num_partido_').val(data.dato.pk_num_partida);
                        var info = $('#ind_partida_').val(data.dato.ind_partida);
                        var fk_num_equipo1= $('#fk_num_equipo1_').val(data.dato.fk_num_equipo1);
                        var fk_num_equipo2= $('#fk_num_equipo2_').val(data.dato.fk_num_equipo2);
                        var fk_num_disciplina= $('#fk_num_disciplina_').val(data.dato.fk_num_disciplina);
                        var num_puntos_equipo1= $('#num_puntos_equipo1').val(data.dato.num_puntos_equipo1);
                        var num_puntos_equipo2= $('#num_puntos_equipo2').val(data.dato.num_puntos_equipo2);
                        var num_estatus= $('#num_estatus').val(data.dato.num_estatus);
                        if (data.dato.num_estatus==1){
                            $("#num_estatus").prop('checked',false);
                        }else{
                            $("#num_estatus").prop('checked',true);

                        }
                    }else{
                        alert("Fallo la operacion");

                    }                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        });
        $('#tantos').click( function () {
            var pk_num_partido= $('#pk_num_partido_').val();
            var num_puntos_equipo1= $('#num_puntos_equipo1').val();
            var num_puntos_equipo2= $('#num_puntos_equipo2').val();
            var equipo1= $('#fk_num_equipo1_').val();
            var info = $('#ind_partida_').val();
            var equipo2= $('#fk_num_equipo2_').val();

            if (num_puntos_equipo2>num_puntos_equipo1)
            {
                var ganador=equipo2;
            }else {
                var ganador=equipo1;
            }

            if( $('#num_estatus').prop('checked') ) {
                var num_estatus=0;
            }else{
                var num_estatus=1;
            }


                    var caso="puntosxPartido";
                    var dat = {'pk_num_partido':pk_num_partido,'info': info ,'ganador': ganador,'num_estatus': num_estatus ,'num_puntos_equipo1':num_puntos_equipo1,'num_puntos_equipo2':num_puntos_equipo2, 'caso': caso};


                $.ajax({
                    type: "POST",
                    url: '../controlador/enrutador.php',
                    data: dat,//capturo array
                    success: function (data) {
                        if(data.estatus=="ok") {

                                alert("Almacenado Exitosamente");
                               // location.reload();
                            $.ajax({
                                type: "POST",
                                url: '../controlador/enrutador.php',
                                data: {'pk_num_equipo':pk_num_equipo, 'caso': caso},//capturo array
                                success: function(data){
                                    if(data.estatus=="ok"){
                                        var pk_num_partido= $('#pk_num_partido_').val(data.dato.pk_num_partida);
                                        var info = $('#ind_partida_').val(data.dato.ind_partida);
                                        var fk_num_equipo1= $('#fk_num_equipo1_').val(data.dato.fk_num_equipo1);
                                        var fk_num_equipo2= $('#fk_num_equipo2_').val(data.dato.fk_num_equipo2);
                                        var fk_num_disciplina= $('#fk_num_disciplina_').val(data.dato.fk_num_disciplina);
                                        var num_puntos_equipo1= $('#num_puntos_equipo1').val(data.dato.num_puntos_equipo1);
                                        var num_puntos_equipo2= $('#num_puntos_equipo2').val(data.dato.num_puntos_equipo2);
                                        var num_estatus= $('#num_estatus').val(data.dato.num_estatus);
                                        if (data.dato.num_estatus==1){
                                            $("#num_estatus").prop('checked',false);
                                        }else{
                                            $("#num_estatus").prop('checked',true);

                                        }
                                    }else{
                                        alert("Fallo la operacion");

                                    }                },
                                error: function (request, status, error) {
                                    alert(request.responseText);
                                }
                            });

                        }else{
                            alert("Fallo la operacion");

                        }                    }
                });

        });

    });
</script>

