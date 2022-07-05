<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', '1');
include ('controlador.php');
$con= new controlador();
$data = array();
if (isset($_POST['caso']) && !empty($_POST['caso'])){
    $caso=$_POST['caso'];
    switch ($caso){
        /************
         * INICIO SWITCH EQUIPO
         */
        case 'verEquipo':
            $resp=   $con->verEquipo($_POST['pk_num_equipo']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['dato']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
}
        case 'guardarEquipo':
            $resp=   $con->guardarEquipo($_POST['equipo']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
        case 'editarEquipo':
          $resp=  $con->editarEquipo($_POST['equipo'],$_POST['pk_num_equipo']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
        /************
         * INICIO SWITCH PARTIDO
         */
        case 'guardarPartido':
            $resp = $con->guardarPartido($_POST);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'puntosxPartido':
            $resp=  $con->puntosxPartido($_POST,$_POST['pk_num_partido']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
            case 'agregarPuntos':
        $resp=  $con->agregarPuntos($_POST,$_POST['pk_num_partido']);
        if ($resp!=0)
        {
            $data['estatus']="ok";
            $data['id']=$resp;
            echo json_encode($data);
            break;
        }else{
            $data['estatus']="fallo";
            echo json_encode($data);
            break;
        }
        case 'editarPartido':
            $resp=  $con->editarPartido($_POST,$_POST['pk_num_partido']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
        case 'verPartido':
            $resp=   $con->verPartido($_POST['pk_num_equipo']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['dato']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
        /************
         * INICIO SWITCH DISCIPLINA
         */
            case 'guardarDisciplina':
            $resp = $con->guardarDisciplina($_POST);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;

            }
        case 'editarDisciplina':
            $resp=  $con->editarDisciplina($_POST['disciplina'],$_POST['pk_num_disciplina']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
        case 'verDisciplina':
            $resp=   $con->verDisciplina($_POST['pk_num_equipo']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['dato']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
        /************
         * INICIO SWITCH ACTIVIDADES
         */
        case 'guardarActividad':
            $resp = $con->guardarActividad($_POST);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;

            }
        case 'editarActividad':
            $resp=  $con->editarActividad($_POST['disciplina'],$_POST['pk_num_disciplina']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
        case 'verDisciplina':
            $resp=   $con->verActividad($_POST['pk_num_equipo']);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['dato']=$resp;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;
            }
        case 'listaActividades':
           $resp=   $con->listarActividad($_POST['hora']);
                $data['dato']=$resp;
                echo json_encode($data);
                break;
        case 'obtenerPartidoEjecucion':
            $resp=   $con->obtenerPartidoEjecucion();
            $data['dato']=$resp;
            echo json_encode($data);
            break;

    }
}

