<?php
class ControlItem{
    private ServicioItem $servicioItem;

    // Constructor donde inyectamos el servicio
    public function __construct(ServicioItem $servicioItem) {
        $this->servicioItem = $servicioItem;
    }

    public function controlGet(){
        if(isset($_GET["id"])){
            $id =  $_GET['id'];

            try{
                if ($id === 'todos') {
                    $items = $this->servicioItem->Todos();
                    echo json_encode($items);

                }else {
                    $item = $this->servicioItem->validaExiste($id);
                    echo json_encode($item);    
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

        $iditem = $data['iditem'];
        $descripcion = $data['descripcion'];
        $peso = $data['peso'];
        $gradosConsecucion = $data['gradosConsecucion'];
        $prueba_idprueba = $data['prueba_idprueba'];

        $itemPost = new Item($iditem,$descripcion, $peso, $gradosConsecucion, $prueba_idprueba);
        if( $this->servicioItem->CamposExiste($itemPost)){
            $this->servicioItem->crear($itemPost);

        }else{
            echo json_encode(["Error: no esta completo el objeto "]);
        }
    }

    public function ControlDelete(){
        if($_GET["id"]){
            $id =  $_GET['id'];
            $item = $this->servicioItem->borrar($id);
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