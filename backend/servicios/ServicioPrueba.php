<?php
class ServicioPrueba {

    private RepoPrueba $repoPrueba;

    // Inyeccion del repo por constructor
    public function __construct(RepoPrueba $repoPrueba) {
        $this->repoPrueba = $repoPrueba;
    }

    /**Validaciones */
    public function validaExiste($id) {
        //miramos que exista dicho id
        $prueba = $this->repoPrueba->findById($id);
        // var_dump ($especialidad);
        if(!$prueba){
            throw new Exception ("No se puede encontrar una prueba con el id: " . $id);
        }
        return $prueba;
    }

    public function borrar($id){
        $prueba = $this->repoPrueba->delete($id);
        if($prueba == false){
            throw new Exception ("No se puede borrar la prueba con el id: ".$id);
        }
    }

    public function CamposExiste($prueba){
        //miramos que exista dicho id
        if(empty($prueba->idprueba()) || empty($prueba->getEnunciado()) || empty($prueba->getPuntuacionMaxima())
        || empty($prueba->getEspecialidadIdespecialidad()))
        {
            throw new Exception("Error: Faltan campos para la variable ".$prueba);
        }
        return $prueba;

    }

    public function Todos(){

        $ArrayPruebas = $this->repoPrueba->findAll();
        foreach($ArrayPruebas as $Prueba){
            $pruebas[]= $this->CamposExiste($Prueba);
        }
        return $pruebas;
    }

    public function crear($Prueba){
        $creado = $this->repoPrueba->crear($Prueba);
    }

}