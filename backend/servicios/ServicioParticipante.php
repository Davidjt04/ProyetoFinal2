<?php
class ServicioParticipante  {

    private RepoParticipante $repoParticipante ;

    // Inyeccion del repo por constructor
    public function __construct(RepoParticipante $repoParticipante) {
        $this->repoParticipante = $repoParticipante;
    }

    /**Validaciones */
    public function validaExiste($id) {
        //miramos que exista dicho id
        $participante = $this->repoParticipante->findById($id);
        // var_dump ($especialidad);
        if(!$participante){
            throw new Exception ("No se puede encontrar un participante con el id: " . $id);
        }
        return $participante;
    }

    public function borrar($id){
        $participante = $this->repoParticipante->delete($id);
        if($participante == false){
            throw new Exception ("No se puede borrar el participante con el id: ".$id);
        }
    }

    public function CamposExiste($participante){
        //miramos que exista dicho id
        if(empty($participante->getIdparticipante()) || empty($participante->getNombre()) || empty($participante->getApellidos())
        || empty($participante->getCentro())|| empty($participante->getEspecialidadIdespecialidad()))
        {
            throw new Exception("Error: Faltan campos para la variable ".$participante);
        }
        return $participante;

    }

    public function Todos(){

        $ArrayParticipantes= $this->repoParticipante->findAll();
        foreach($ArrayParticipantes as $participante){
            $participantes[]= $this->CamposExiste($participante);
        }
        return $participantes;
    }

    public function crear($participante){
        $creado = $this->repoParticipante->crear($participante);
    }

}