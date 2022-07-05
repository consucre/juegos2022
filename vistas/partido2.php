<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once ('../controlador/controlador.php');


$a= new controlador();
$partidos = $a->obtenerParrillaPartidos();

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
    <div class="row" style="margin-top: 5%; text-align: right;"></div>
<img src=""  alt=""/>
    <div class="row ">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto table" id="table" style="margin-top: 10%; text-align: center; color: black;">
            <table class="table table-bordered table-hovered table-striped" id="productTable">


                <?php
                foreach($partidos as $product) : ?>

                    <tr style="text-align: center;  align-items: center ; font-size: 24pt;">
                        <td ><b><br/><?php echo $product['ind_nombre_disciplina']; ?> </b></td>
                        <td ><b><br/><?php echo $product['ind_partida']; ?> </b></td>
                        <td> <?php
                            if ($product['num_estatus']==1 and $product['flag_ejecucion']==0) {
                                echo    '<img width="75px" height="75px" src="../lib/imagenes/logos/'.$product['foto1'].'">' ;
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo    '<img width="75px" height="75px" src="../lib/imagenes/logos/'.$product['foto2'].'">' ;
                            }else{
                                echo    '<img width="75px" height="75px" src="../lib/imagenes/logos/'.$product['foto1'].'"> '.$product['num_puntos_equipo1'] ;
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo    $product['num_puntos_equipo2'].'  <img width="75px" height="75px" src="../lib/imagenes/logos/'.$product['foto2'].'">' ;

                             }
                            ?> </td>


                    </tr>


                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

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
</html>

