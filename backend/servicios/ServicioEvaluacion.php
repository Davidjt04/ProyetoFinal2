<?php
class ServicioEvaluacion{

    private RepoEvaluacion $repoEvaluacion;

    // Inyeccion del repo por constructor
    public function __construct(RepoEvaluacion $repoEvaluacion) {
        $this->repoEvaluacion = $repoEvaluacion;
    }

    /**Validaciones */
    public function validaExiste($id) {
        //miramos que exista dicho id
        $evaluacion = $this->repoEvaluacion->findById($id);
        // var_dump ($especialidad);
        if(!$evaluacion){
            throw new Exception ("No se puede encontrar una evaluacion con el id: " . $id);
        }
        return $evaluacion;
    }

    public function borrar($id){
        $evaluacion = $this->repoEvaluacion->delete($id);
        if($evaluacion == false){
            throw new Exception ("No se puede borrar la especialidad con el id: ".$id);
        }
    }

    public function CamposExiste($evaluacion){
        //miramos que exista dicho id
        if(empty($evaluacion->getIdevaluacion()) || empty($evaluacion->getNotaFinal()) || empty($evaluacion->getParticipanteIdparticipante())
        || empty($evaluacion->getUsusarioIdususario())||empty($evaluacion->getPruebaIdprueba()))
        {
            throw new Exception("Error: Faltan campos para la variable ".$evaluacion);
        }
        return $evaluacion;

    }

    public function Todos(){

        $ArrayEvaluaciones = $this->repoEvaluacion->findAll();
        foreach($ArrayEvaluaciones as $evaluacion){
            $Evaluaciones[]= $this->CamposExiste($evaluacion);
        }
        return $Evaluaciones;
    }

    public function crear($evaluacion){
        $creado = $this->repoEvaluacion->crear($evaluacion);
    }

}