<?php
class ControlEvaluacion{
    private ServicioEvaluacion $servicioEvaluacion;

    // Constructor donde inyectamos el servicio
    public function __construct(ServicioEvaluacion $servicioEvaluacion) {
        $this->servicioEvaluacion = $servicioEvaluacion;
    }

    public function controlGet(){
        if(isset($_GET["id"])){
            $id =  $_GET['id'];

            try{
                if ($id === 'todos') {
                    $evaluaciones = $this->servicioEvaluacion->Todos();
                    echo json_encode($evaluaciones);
                    // var_dump($especialidades);

                }else {
                    $evaluacion = $this->servicioEvaluacion->validaExiste($id);
                    // var_dump($especialidad);
                    echo json_encode($evaluacion);    
                }

                
            }catch(Exception $e){
                echo json_encode(['error' => $e->getMessage()]);
            }

        }else{
            echo json_encode(['error' => 'ID no proporcionado']);
 
        }
    }
    public function ControlPost(){
        $data = json_decode(file_get_contents('php://input'), true);

        $idevaluacion = $data['idevaluacion'];
        $notaFinal = $data['notaFinal'];
        $participante_idparticipante = $data['participante_idparticipante'];
        $ususario_idususario = $data['ususario_idususario'];
        $prueba_idprueba = $data['prueba_idprueba'];

        $evaluacionPost = new Evaluacion($idevaluacion,$notaFinal,$participante_idparticipante, $ususario_idususario,$prueba_idprueba);
        if( $this->servicioEvaluacion->CamposExiste($evaluacionPost)){
            $this->servicioEvaluacion->crear($evaluacionPost);

        }else{
            echo json_encode(["Error: no esta completo el objeto "]);
        }
    }

    public function ControlDelete(){
        if($_GET["id"]){
            $id =  $_GET['id'];
            $evaluacion = $this->servicioEvaluacion->borrar($id);
            try{
                echo json_encode(["Borado satisfactoriamente"]);

            }catch(Exception $e){
                echo json_encode(['Error' => $e->getMessage()]);
            }
        }else{ 
            echo json_encode(['error' => 'ID no proporcionado']);
 
        }
    }
}