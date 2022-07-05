<?php
	require_once("../modelo/modelo.php");

	class controlador
    {

        private $caso;
        private $model;
        private $func;

        public function  __construct()
        {
            $this->model = new modelo();


        }
        public function obtenerPartidos(){

            return $this->model->obtenerPartidos();

        }
        public function obtenerParrillaPartidos(){

        return $this->model->obtenerParrillaPartidos();

    }
        public function obtenerPartidoEjecucion(){

            return $this->model->obtenerPartidoEjecucion();

        }
        public function obtenerEquipos(){

        return $this->model->obtenerEquipos();

        }
        public function obtenerActividades(){

            return $this->model->obtenerActividades();

        }
        public function obtenerDisciplinas(){

            return $this->model->obtenerDisciplinas();

        }
        public function obtenerPosiciones(){

            return $this->model->obtenerPosiciones();

        }

        /**  EQUIPO
         * @param $equipo
         * @return mixed
         */
    public function guardarEquipo($equipo){

            $resp= $this->model->guardarEquipo($equipo);
            return $resp;
    }
        public function editarEquipo($equipo,$id){

            $resp= $this->model->editarEquipo($equipo,$id);
            return $resp;
        }
        public function verEquipo($equipo){
            $resp= $this->model->verEquipo($equipo);
            return $resp;
        }


        /** DISCIPLINA
         * @param $dato
         */
        public function guardarDisciplina($dato){
            $resp = $this->model->guardarDisciplina($dato);
            return $resp;

        }
        public function editarDisciplina($equipo,$id){
            $resp= $this->model->editarDisciplina($equipo,$id);
            return $resp;
        }
        public function verDisciplina($equipo){
            $resp= $this->model->verDisciplina($equipo);
            return $resp;
        }
        /** PARTIDO
         * @param $dato
         */
        public function guardarPartido($dato){
            $resp = $this->model->guardarPartido($dato);
            return $resp;
        }
        public function editarPartido($dato,$id){
            $resp= $this->model->editarPartido($dato,$id);
            return $resp;
        }
        public function puntosxPartido($dato,$id){
            $resp= $this->model->puntosxPartido($dato,$id);
            return $resp;
        }
        public function agregarPuntos($dato,$id){
        $resp= $this->model->agregarPuntos($dato,$id);
        return $resp;
    }
        public function verPartido($dato){
            $resp= $this->model->verPartido($dato);
            return $resp;
        }
        /** CRONOGRAMA
         * @param $dato
         */
        public function guardarActividad($dato){

            #ajusto el formato de las horas
            $hora = substr($dato['hora'],0,2);
            $min = substr($dato['hora'],3,2);
            $am_pm = substr($dato['hora'],6,1);
            if($am_pm=='p'){
                $hora = $hora + 12;
            }
            if(!is_numeric($hora) OR !is_numeric($min)){
                $dato['hora'] = 'error';
            }
            $dato['hora'] = $hora.":".$min.":00";

            $resp = $this->model->guardarActividad($dato);
            return $resp;
        }
        public function editarActividad($dato,$id){
            $resp= $this->model->editarActividad($dato,$id);
            return $resp;
        }
        public function verActividad($dato){
            $resp= $this->model->verActividad($dato);
            return $resp;
        }
        public function listarActividad($dato){
            #ajusto el formato de las horas
               $hora = substr($dato,0,2);
               $min = substr($dato,3,2);
               $am_pm = substr($dato,6,1);
               if($am_pm=='p'){
                   $hora = $hora + 12;
               }if ($min <10){
                   $min="0".$min;
            }
               if(!is_numeric($hora) OR !is_numeric($min)){
                   $dato = 'error';
               }
               $a="";
               $dato = $hora.":".$min;
              $resp= $this->model->listaActividad($dato);
              $cont =count($resp);
              $i=1;
              foreach ($resp as $item){
                  $hora = substr($item['ind_hora'],0,2);
                  $min = substr($item['ind_hora'],3,2);
                  if($hora > 12){
                      $hora=$hora-12;
                      $e=" pm";
                  }else{
                      $e=" am";
                  }
                  $item['ind_hora']=$hora.":".$min.''.$e;
                  $a .=$item['ind_actividad']. '  '. $item['ind_hora'];
                  if($i<$cont){
                      $a .='  -  ';
                      $i++;
                  }
              }
              return $a;

           }
    }



?>