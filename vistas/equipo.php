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
    <link href="../lib/css/mm_entertainment.css" rel="stylesheet" type="text/css" />
    <link href="../lib/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../lib/fonta/css/all.css" type="text/css" />

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
                <th style="width: 80%;"> Nombre </th>
                <th style="width: 20%;"> Editar </th>
                </thead>

                <tbody>

                <?php
                foreach($products as $product) : ?>

                    <tr>
                        <td> <?php echo $product['ind_nombre_equipo']; ?> </td>
                        <td> <button type="button" class="edit" VALUE="<?php echo $product['pk_num_equipo']; ?>" class="btn btn-link btn-lg"  data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-edit"></i></button>
                             </td>

                    </tr>


                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
                <button type="button" id="nuevo" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Nuevo Equipo</button>
            </div>
            </div>
        </div>


    </div>

    <!-- Modal -->
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
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input type="hidden" id="pk_num_equipo" name="pk_num_equipo">
                                    <input id="fname" name="name" type="text" placeholder="Nombre del Equipo" class="form-control">
                                </div>
                            </div>

                            </form>
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



</div>
</body>
<script>
    $(document).ready( function () {
        $('#nuevo').click( function () {
            $('#fname').val('');
        });

        $('#guardar').click( function () {
            var equipo= $('#fname').val();
            var id= $('#pk_num_equipo').val();
            if (id!=""){
                var caso = "editarEquipo";
                var datos= {'equipo':equipo, 'pk_num_equipo': id,'caso': caso};
            }else {
                var caso = "guardarEquipo";
                var datos= {'equipo':equipo, 'caso': caso};

            }
            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: datos,//capturo array
                success: function(data){
                if(data.estatus=="ok"){
                    alert("Almacenado Exitosamente");
                    location.reload();
                }else{
                    alert("Fallo la operacion");

                }
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
                    var equipo= $('#fname').val(data.dato.ind_nombre_equipo);
                    var pk_num_equipo= $('#pk_num_equipo').val(data.dato.pk_num_equipo);

                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });        });

    });

</script>

