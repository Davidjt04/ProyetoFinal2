<?php
class ControlEspecialidad{
    private ServicioEspecialidad $servicioEspecialidad;

    // Constructor donde inyectamos el servicio
    public function __construct(ServicioEspecialidad $servicioEspecialidad) {
        $this->servicioEspecialidad = $servicioEspecialidad;
    }

    public function controlGet(){
        if(isset($_GET["id"])){
            $id =  $_GET['id'];

            try{
                if ($id === 'todos') {
                    $especialidades = $this->servicioEspecialidad->Todos();
                    echo json_encode($especialidades);

                }else {
                    $especialidad = $this->servicioEspecialidad->validaExiste($id);
                    echo json_encode($especialidad);    
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

        $idespecialidad = $data['idespecialidad'];
        $nombre = $data['nombre'];
        $codigo = $data['codigo'];

        $especialidadPost = new Especialidad($idespecialidad,$nombre, $codigo);
        if( $this->servicioEspecialidad->CamposExiste($especialidadPost)){
            $this->servicioEspecialidad->crear($especialidadPost);

        }else{
            echo json_encode(["Error: no esta completo el objeto "]);
        }
    }

    public function ControlDelete(){
        if($_GET["id"]){
            $id =  $_GET['id'];
            $especialidad = $this->servicioEspecialidad->borrar($id);
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