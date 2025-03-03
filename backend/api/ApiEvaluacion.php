<?php
class ApiEvaluacion{

    private ControlEvaluacion $controlador;

    public function __construct(ControlEvaluacion $controlador) {
        $this->controlador = $controlador;
    }

    public function manejarSolicitud(){
        $metodo = $_SERVER['REQUEST_METHOD'];

        switch ($metodo) {
            case 'GET':
                $this->controlador->controlGet();
                break;

            case 'POST':    
                $this->controlador->ControlPost();
                break;

            case 'DELETE': 
                $this->controlador->ControlDelete();
        }
    }
}