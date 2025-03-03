<?php
class ControlPrueba{
    private ServicioPrueba $servicioPrueba;

    // Constructor donde inyectamos el servicio
    public function __construct(ServicioPrueba $servicioPrueba) {
        $this->servicioPrueba = $servicioPrueba;
    }

    public function controlGet(){
        if(isset($_GET["id"])){
            $id =  $_GET['id'];

            try{
                if ($id === 'todos') {
                    $prueba = $this->servicioPrueba->Todos();
                    echo json_encode($prueba);

                }else {
                    $prueba = $this->servicioPrueba->validaExiste($id);
                    echo json_encode($prueba);    
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

        $idprueba = $data['idprueba'];
        $enunciado = $data['enunciado'];
        $puntuacionMaxima = $data['puntuacionMaxima'];
        $especialidad_idespecialidad = $data['especialidad_idespecialidad'];

        $pruebaPost = new Especialidad($idprueba,$enunciado, $puntuacionMaxima, $especialidad_idespecialidad);
        if( $this->servicioPrueba->CamposExiste($pruebaPost)){
            $this->servicioPrueba->crear($pruebaPost);

        }else{
            echo json_encode(["Error: no esta completo el objeto "]);
        }
    }

    public function ControlDelete(){
        if($_GET["id"]){
            $id =  $_GET['id'];
            $prueba = $this->servicioPrueba->borrar($id);
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