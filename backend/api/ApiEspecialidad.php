<?php
class ApiEspecialidad{

    private ControlEspecialidad $controlador;

    public function __construct(ControlEspecialidad $controlador) {
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