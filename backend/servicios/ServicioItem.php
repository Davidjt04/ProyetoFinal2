<?php
class ServicioItem {

    private RepoItem $repoItem;

    // Inyeccion del repo por constructor
    public function __construct(RepoItem $repoItem) {
        $this->repoItem = $repoItem;
    }

    /**Validaciones */
    public function validaExiste($id) {
        //miramos que exista dicho id
        $item = $this->repoItem->findById($id);
        // var_dump ($especialidad);
        if(!$item){
            throw new Exception ("No se puede encontrar una especialidad con el id: " . $id);
        }
        return $item;
    }

    public function borrar($id){
        $item = $this->repoItem->delete($id);
        if($item == false){
            throw new Exception ("No se puede borrar el item con el id: ".$id);
        }
    }

    public function CamposExiste($item){
        //miramos que exista dicho id
        if(empty($item->getIditem()) || empty($item->getDescripcion()) || empty($item->getPeso())
        || empty($item->getGradosConsecucion()) || empty($item->getPruebaIdprueba()))
        {
            throw new Exception("Error: Faltan campos para la variable ".$item);
        }
        return $item;

    }

    public function Todos(){

        $ArrayItems = $this->repoItem->findAll();
        foreach($ArrayItems as $item){
            $Items[]= $this->CamposExiste($item);
        }
        return $Items;
    }

    public function crear($item){
        $creado = $this->repoItem->crear($item);
    }

}