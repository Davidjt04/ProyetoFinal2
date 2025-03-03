<?php
class ServicioUsuario {

    private RepoUsuario $repoUsuario;

    // Inyeccion del repo por constructor
    public function __construct(RepoUsuario $repoUsuario) {
        $this->repoUsuario = $repoUsuario;
    }

    /**Validaciones */
    public function validaExiste($id) {
        //miramos que exista dicho id
        $usuario = $this->repoUsuario->findById($id);
        // var_dump ($especialidad);
        if(!$usuario){
            throw new Exception ("No se puede encontrar un usuario con el id: " . $id);
        }
        return $usuario;
    }

    public function borrar($id){
        $usuario = $this->repoUsuario->delete($id);
        if($usuario == false){
            throw new Exception ("No se puede borrar el usuario con el id: ".$id);
        }
    }

    public function CamposExiste($usuario){
        //miramos que exista dicho id
        if(empty($usuario->getIdUsuario()) || empty($usuario->getRol()) || empty($usuario->getUsuario())
        || empty($usuario->getPassword()) || empty($usuario->getNombre()) || empty($usuario->getApellidos()) || empty($usuario->getDni())
        || empty($usuario->getEspecialidad_idespecialidad()))
        {
            throw new Exception("Error: Faltan campos para la variable ".$usuario);
        }
        return $usuario;

    }

    public function Todos(){

        $Arrayusuario = $this->repoUsuario->findAll();
        foreach($Arrayusuario as $usuario){
            $usuarios[]= $this->CamposExiste($usuario);
        }
        return $usuarios;
    }

    public function crear($usuario){
        $creado = $this->repoUsuario->crear($usuario);
    }

}