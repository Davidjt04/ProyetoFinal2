<?php
class ControlUsuario{
    private ServicioUsuario $servicioUsuario;

    // Constructor donde inyectamos el servicio
    public function __construct(ServicioUsuario $servicioUsuario) {
        $this->servicioUsuario = $servicioUsuario;
    }

    public function controlGet(){
        if(isset($_GET["id"])){
            $id =  $_GET['id'];

            try{
                if ($id === 'todos') {
                    $usuario = $this->servicioUsuario->Todos();
                    echo json_encode($usuario);

                }else {
                    $usuario = $this->servicioUsuario->validaExiste($id);
                    echo json_encode($usuario);    
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

        $idususario = $data['idususario'];
        $rol = $data['rol'];
        $usuario = $data['usuario'];
        $password = $data['password'];
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $dni = $data['dni'];
        $especialidad_idespecialidad = $data['especialidad_idespecialidad'];
        

        $usuarioPost = new Usuario($idususario,$rol, $usuario,$password,$nombre, $apellidos,$dni,$especialidad_idespecialidad);
        if( $this->servicioUsuario->CamposExiste($usuarioPost)){
            $this->servicioUsuario->crear($usuarioPost);

        }else{
            echo json_encode(["Error: no esta completo el objeto "]);
        }
    }

    public function ControlDelete(){
        if($_GET["id"]){
            $id =  $_GET['id'];
            $ususario = $this->servicioUsuario->borrar($id);
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