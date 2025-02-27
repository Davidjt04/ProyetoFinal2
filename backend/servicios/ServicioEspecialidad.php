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
        $especialidad = $this->$repoEspecialidad->findById($id);
        if(!$especialidad){
            throw new Exception ("No se puede encontrar una especialidad con el id: "+$id);
        }
    }

    public function validaUpsert($especialidad){
        //miramos que exista dicho id
        if(empty($this->repoEspecialidad->getIdespecialidad())){
            
        }

    }

}