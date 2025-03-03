<?php
class ServicioEspecialidad {

    private RepoEspecialidad $repoEspecialidad;

    // Inyeccion del repo por constructor
    public function __construct(RepoEspecialidad $repoEspecialidad) {
        $this->repoEspecialidad = $repoEspecialidad;
    }

    /**Validaciones */
    public function validaExiste($id) {
        //miramos que exista dicho id
        $especialidad = $this->repoEspecialidad->findById($id);
        // var_dump ($especialidad);
        if(!$especialidad){
            throw new Exception ("No se puede encontrar una especialidad con el id: " . $id);
        }
        return $especialidad;
    }

    public function borrar($id){
        $especialidad = $this->repoEspecialidad->delete($id);
        if($especialidad == false){
            throw new Exception ("No se puede borrar la especialidad con el id: ".$id);
        }
    }

    public function CamposExiste($especialidad){
        //miramos que exista dicho id
        if(empty($especialidad->getIdespecialidad()) || empty($especialidad->getNombre()) || empty($especialidad->getCodigo())
        || empty($especialidad->getCodigo()))
        {
            throw new Exception("Error: Faltan campos para la variable ".$especialidad);
        }
        return $especialidad;

    }

    public function Todos(){

        $ArrayEspecialidades = $this->repoEspecialidad->findAll();
        foreach($ArrayEspecialidades as $especialidad){
            $Especialidades[]= $this->CamposExiste($especialidad);
        }
        return $Especialidades;
    }

    public function crear($especialidad){
        $creado = $this->repoEspecialidad->crear($especialidad);
    }

}