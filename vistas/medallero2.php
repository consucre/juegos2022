<?php
require_once ('../controlador/controlador.php');


$a= new controlador();
$products=$a->obtenerPosiciones();
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
    <div class="row" style="margin-top: 5%; text-align: right;"><br/> </div>

    <div class="row ">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto table" id="table" style="margin-top: 10%;">
            <table class="table table-bordered table-hovered table-striped" id="productTable">
                <thead>
                <th style="width: 80%;"> Nombre </th>
                <th style="width: 20%;"> Puntos </th>
                </thead>

                <tbody>

                <?php
                foreach($products as $product) : ?>

                    <tr style="text-align: center;  align-items: center ; font-size: 24pt;">
                        <td> <?php echo '<img width="45px" height="45px" src="../lib/imagenes/logos/'.$product['ind_foto'].'">  &nbsp;'.$product['ind_nombre_equipo']; ?> </td>
                        <td>  <?php echo $product['num_puntos']; ?> </td>

                    </tr>


                <?php endforeach; ?>
                </tbody>
            </table>

        </div>


    </div>

    <!-- Modal -->
</div>



</div>
</body>
<script>
    var TimerId = setTimeout("ClosePage()",20*1000);
    function ClosePage()
    {
        clearTimeout(TimerId);
        self.close();
    }
</script>

