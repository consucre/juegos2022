<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "../config/conexion.php"; // or the path relative to database.php
	class modelo{

        private $pdo;
        private $equipo;
        private $actividad;
        private $disciplina;
        private $partida;
        private $medallero;




        public function __construct(){
            try
            {
                $this->pdo = Database::StartUp();
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }/*
            $this->equipo=array();
            $this->actividad=array();
            $this->disciplina=array();
            $this->partida=array();
            $this->medallero=array();*/

	    }

        public function obtenerDisciplinas(){

            $ciudad = $this->pdo->query(
                "SELECT * FROM disciplina");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

	    }

        public function obtenerEquipos(){

            $ciudad = $this->pdo->query(
                "SELECT * FROM equipo");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

        }
        public function obtenerPartidos(){

            $ciudad = $this->pdo->query(
                "SELECT pk_num_partida,partido.num_estatus, partido.flag_ejecucion, 
 CONCAT(d.ind_nombre_disciplina,' - ' ,a.ind_nombre_equipo,' vs ' ,e.ind_nombre_equipo,' ') as ind_partido FROM partido
INNER JOIN equipo  a on (partido.fk_num_equipo1=a.pk_num_equipo)
INNER JOIN equipo  e on (partido.fk_num_equipo2=e.pk_num_equipo)
INNER JOIN disciplina d on (partido.fk_num_disciplina=d.pk_num_disciplina)
ORDER BY pk_num_partida ASC
 ");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

        }

        public function obtenerParrillaPartidos(){

            $ciudad = $this->pdo->query(
                "SELECT pk_num_partida,d.ind_nombre_disciplina, partido.ind_partida,
a.ind_nombre_equipo as equipo1, a.ind_foto as foto1, partido.num_puntos_equipo1, partido.num_puntos_equipo2, e.ind_nombre_equipo as esquipo2, e.ind_foto as foto2, 
 CONCAT(a.ind_nombre_equipo,' vs ' ,e.ind_nombre_equipo,' ') as ind_partido,
 CONCAT(a.ind_nombre_equipo,' ',partido.num_puntos_equipo1,' - ' ,partido.num_puntos_equipo2,' ',e.ind_nombre_equipo,' ') as ind_resultado,
 partido.num_estatus, partido.flag_ejecucion
 FROM partido
INNER JOIN equipo  a on (partido.fk_num_equipo1=a.pk_num_equipo)
INNER JOIN equipo  e on (partido.fk_num_equipo2=e.pk_num_equipo)
INNER JOIN disciplina d on (partido.fk_num_disciplina=d.pk_num_disciplina)
ORDER BY pk_num_partida ASC
 ");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

        }

        public function obtenerPartidoEjecucion(){

            $ciudad = $this->pdo->query(
                "SELECT pk_num_partida,
 d.ind_nombre_disciplina,a.ind_nombre_equipo as equipo1, a.ind_foto as foto1, num_puntos_equipo1 ,e.ind_nombre_equipo as equipo2, e.ind_foto as foto2,num_puntos_equipo2  FROM partido
INNER JOIN equipo  a on (partido.fk_num_equipo1=a.pk_num_equipo)
INNER JOIN equipo  e on (partido.fk_num_equipo2=e.pk_num_equipo)
INNER JOIN disciplina d on (partido.fk_num_disciplina=d.pk_num_disciplina) 
where flag_ejecucion = 1 and num_estatus=1

ORDER BY pk_num_partida ASC
 ");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

        }
        public function obtenerPosiciones(){
            $ciudad = $this->pdo->query(
                "SELECT equipo.ind_nombre_equipo, medallero.num_puntos, equipo.ind_foto 
                            FROM medallero 
                            INNER JOIN equipo on (medallero.fk_num_equipo=equipo.pk_num_equipo) 
                            ORDER BY num_puntos DESC");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

        }
        public function obtenerActividades(){
            $a = $this->pdo->query(
                "SELECT * FROM cronograma ");
            $a->setFetchMode(PDO::FETCH_ASSOC);
            return $a->fetchAll();

        }

        public function listaActividad($hora){
           // var_dump("SELECT * from cronograma where ind_hora >'$hora'");
            $ver = $this->pdo->query("SELECT * from cronograma where ind_hora >'$hora'");

            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetchAll();
        }


        /***********************
         * @param $equipo
         * @return mixed
         */
        public function guardarEquipo($equipo){
            $guardar = $this->pdo->prepare('INSERT INTO equipo set ind_nombre_equipo=:ind_nombre_equipo');
            $guardar->execute(array(
                'ind_nombre_equipo' => $equipo
            ));
             $idEquipo= $this->pdo->lastInsertId();
             $med= $this->pdo->prepare('INSERT INTO medallero set 
                                                        fk_num_equipo=:fk_num_equipo,
                                                        num_puntos=0');
             $med->execute(array(
                 'fk_num_equipo' => $idEquipo
             ));
             return $idEquipo;
        }
        public function editarEquipo($equipo,$id){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE equipo set  
                            ind_nombre_equipo=:ind_nombre_equipo
                            WHERE pk_num_equipo='$id'");
            $guardar->execute(array(
                'ind_nombre_equipo' => $equipo
            ));
            return $id;
        }
        public function verEquipo($id){
            require_once ('../config/conexion.php');
            $ver = $this->pdo->query('SELECT * from equipo where pk_num_equipo='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
                return $ver->fetch();
        }

        /***********************
         * @param $actividad
         * @return mixed
         */
        public function guardarActividad($datos){

            $guardar = $this->pdo->prepare('INSERT INTO cronograma set 
                                        ind_actividad=:ind_actividad,
                                        ind_hora=:ind_hora');
            $guardar->execute(array(
                'ind_actividad' => $datos['Nombre'],
                'ind_hora' => $datos['hora']
            ));
            return $this->pdo->lastInsertId();
        }
        public function editarActividad($actividad,$hora,$id){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE cronograma set 
                                        ind_actividad=:ind_actividad,
                                        ind_hora=:ind_hora
                            WHERE pk_num_actividad='$id'");
            $guardar->execute(array(
                'ind_actividad' => $actividad,
                'ind_hora' => $hora,
            ));
            return $id;
        }
        public function verActividad($id){
            require_once ('../config/conexion.php');
            $ver = $this->pdo->query('SELECT * from cronograma where pk_num_actividad='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();
        }

        /***********************
         * @param $disciplina
         * @return mixed
         */
        public function guardardisciplina($disciplina){
            $guardar = $this->pdo->prepare('INSERT INTO disciplina set 
                                        ind_nombre_disciplina=:ind_nombre_disciplina');
            $guardar->execute(array(
                'ind_nombre_disciplina' => $disciplina['Nombre'],

            ));
            return $this->pdo->lastInsertId();
        }
        public function editarDisciplina($disciplina,$id){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE disciplina set 
                                        ind_nombre_disciplina=:ind_nombre_disciplina
                            WHERE pk_num_disciplina='$id'");
            $guardar->execute(array(
                'ind_nombre_disciplina' => $disciplina,
            ));
            return $id;
        }
        public function verDisciplina($id){
            require_once ('../config/conexion.php');
            $ver = $this->pdo->query('SELECT * from disciplina where pk_num_disciplina='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();
        }

        /***********************
         * @param $partido
         * @return mixed
         */
        public function guardarPartido($disciplina){
$guardar = $this->pdo->prepare('INSERT INTO partido set 
                                        ind_partida=:ind_partida,
                                        fk_num_disciplina=:fk_num_disciplina,
                                        fk_num_equipo1=:fk_num_equipo1,
                                        fk_num_equipo2=:fk_num_equipo2,
                                        num_puntos_equipo1=0,
                                        num_puntos_equipo2=0,
                                        num_estatus=1,
                                        flag_ejecucion=0
                                        ');
            $guardar->execute(array(
                'ind_partida' => $disciplina['ind_partida'],
                'fk_num_disciplina' => $disciplina['fk_num_disciplina'],
                'fk_num_equipo1' => $disciplina['fk_num_equipo1'],
                'fk_num_equipo2' => $disciplina['fk_num_equipo2']
            ));
            return $this->pdo->lastInsertId();
        }
        public function editarPartido($disciplina,$id){
            $guardar = $this->pdo->prepare("UPDATE partido set 
                                        ind_partida=:ind_partida,
                                        fk_num_disciplina=:fk_num_disciplina,
                                        fk_num_equipo1=:fk_num_equipo1,
                                        fk_num_equipo2=:fk_num_equipo2
                            WHERE pk_num_partida='$id'");
            $guardar->execute(array(
                'ind_partida' => $disciplina['ind_partida'],
                'fk_num_disciplina' => $disciplina['fk_num_disciplina'],
                'fk_num_equipo1' => $disciplina['fk_num_equipo1'],
                'fk_num_equipo2' => $disciplina['fk_num_equipo2']
            ));
            return $id;
        }
        public function puntosxPartido($disciplina,$id){

            if ($disciplina['info']=="FINAL" and $disciplina['num_estatus']==0 ){
                $guardar1 = $this->pdo->prepare("UPDATE partido set 
                                        num_puntos_equipo1=:num_puntos_equipo1,
                                        num_puntos_equipo2=:num_puntos_equipo2,
                                        num_estatus=:num_estatus,
                                        flag_ejecucion=1
                            WHERE pk_num_partida='$id'");
                $guardar1->execute(array(
                    'num_estatus' => $disciplina['num_estatus'],
                    'num_puntos_equipo1' => $disciplina['num_puntos_equipo1'],
                    'num_puntos_equipo2' => $disciplina['num_puntos_equipo2']
                ));
                $ver = $this->pdo->query('SELECT * from medallero where fk_num_equipo='.$disciplina['ganador']);
                $ver->setFetchMode(PDO::FETCH_ASSOC);
                $data= $ver->fetch();

                $pk= $data['pk_num_medallero'];
                $puntos= $data['num_puntos']+10;
                $guardar = $this->pdo->prepare("UPDATE medallero set
                                        num_puntos=:num_puntos                                       
                            WHERE fk_num_equipo='$pk'");
                $guardar->execute(array(
                    'num_puntos' => $puntos

                ));
                return $id;
            }else{
                $guardar1 = $this->pdo->prepare("UPDATE partido set 
                                        num_puntos_equipo1=:num_puntos_equipo1,
                                        num_puntos_equipo2=:num_puntos_equipo2,
                                        num_estatus=:num_estatus,
                                        flag_ejecucion=1
                            WHERE pk_num_partida='$id'");
                $guardar1->execute(array(
                    'num_estatus' => $disciplina['num_estatus'],
                    'num_puntos_equipo1' => $disciplina['num_puntos_equipo1'],
                    'num_puntos_equipo2' => $disciplina['num_puntos_equipo2']
                ));
                return $id;

            }
        }
        public function agregarPuntos($disciplina,$id){
            $ver = $this->pdo->query('SELECT * from medallero where fk_num_equipo='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            $data= $ver->fetch();
            var_dump($data);
      /*      $guardar = $this->pdo->prepare("UPDATE medallero set
                                        num_puntos=:num_puntos                                       
                            WHERE fk_num_equipo='$id'");
            $guardar->execute(array(
                'num_puntos' => $disciplina['num_puntos']

            ));
            return $id;*/
        }
        public function verPartido($id){
            $ver = $this->pdo->query('SELECT * from partido where pk_num_partida='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();
        }




    }

	?>