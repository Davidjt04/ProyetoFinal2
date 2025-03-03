<?php
class ControlParticipante{
    private ServicioParticipante $servicioParticipante;

    // Constructor donde inyectamos el servicio
    public function __construct(ServicioParticipante $servicioParticipante) {
        $this->servicioParticipante = $servicioParticipante;
    }

    public function controlGet(){
        if(isset($_GET["id"])){
            $id =  $_GET['id'];

            try{
                if ($id === 'todos') {
                    $participante = $this->servicioParticipante->Todos();
                    echo json_encode($participante);

                }else {
                    $participante = $this->servicioParticipante->validaExiste($id);
                    echo json_encode($participante);    
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

        $idparticipante = $data['idparticipante'];
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $centro = $data['centro'];
        $especialidad_idespecialidad = $data['especialidad_idespecialidad'];

        $participantePost = new Participante($idparticipante,$nombre, $apellidos,$centro,$especialidad_idespecialidad);
        if( $this->servicioParticipante->CamposExiste($participantePost)){
            $this->servicioParticipante->crear($participantePost);

        }else{
            echo json_encode(["Error: no esta completo el objeto "]);
        }
    }

    public function ControlDelete(){
        if($_GET["id"]){
            $id =  $_GET['id'];
            $participante = $this->servicioParticipante->borrar($id);
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