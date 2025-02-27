<?php


class RepoUsuario{
    //FIND BY ID 
    public function findById($id){
        //metemos la conexion
        $conexion = Conexion::getConection();
        //creamos el objeto stmt
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE idususario = ?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute(); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            return new Usuario($row['idususario'],$row['rol'],$row['usuario'],$row['password'],$row['nombre'],$row['apellidos'],$row['dni'],$row['especialidad_idespecialidad']);
        }
    }

    public function findAll(){
        $conexion = Conexion::getConection();
        $stmt = $conexion->query("SELECT * FROM usuario");
        //creo el array donde meteré todas las tupplas
        $usuarios = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $usuarios[] = new Usuario($row['idususario'],$row['rol'],$row['usuario'],$row['password'],$row['nombre'],$row['apellidos'],$row['dni'],$row['especialidad_idespecialidad']);
        }
        return $usuarios;
    }

    public function delete($id){
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare('DELETE FROM usuario WHERE idususario = ?');
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function crear(Usuario $usuario) {
        // Verificamos si el alérgeno con este ID ya existe
        $idususario = $this->findById($usuario->getIdUsuario());

        if ($idususario) {
            // Si existe, hacemos un update
            return $this->update($usuario);
        } else {
            // Si no existe, hacemos un create
            $conexion = Conexion::getConection();
            $stmt = $conexion->prepare("INSERT INTO usuario (idususario, rol, usuario, password,nombre, apellidos,dni,especialidad_idespecialidad)
            VALUES (:idususario, :rol, :usuario,:password,:nombre,:apellidos,:dni,:especialidad_idespecialidad)");

            $idususario = $especialidad->getIdUsuario();
            $rol = $especialidad->getRol();
            $usuario = $especialidad->getUsuario();
            $password = $especialidad->getPassword();
            $nombre = $especialidad->getNombre();
            $apellidos = $especialidad->getApellidos();
            $dni = $especialidad->getDni();
            $especialidad_idespecialidad = $especialidad->getEspecialidad_idespecialidad();

            $stmt->bindParam(':idususario', $idususario, PDO::PARAM_INT);
            $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt->bindParam(':especialidad_idespecialidad', $especialidad_idespecialidad, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }
    }

    public function update(Usuario $usuario) {
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare("UPDATE usuario SET rol = :rol, usuario = :usuario , password = :password , nombre = :nombre , apellidos = :apellidos , dni = :dni, especialidad_idespecialidad = :especialidad_idespecialidad  
        WHERE idususario = :idususario");

        $idususario = $especialidad->getIdUsuario();
        $rol = $especialidad->getRol();
        $usuario = $especialidad->getUsuario();
        $password = $especialidad->getPassword();
        $nombre = $especialidad->getNombre();
        $apellidos = $especialidad->getApellidos();
        $dni = $especialidad->getDni();
        $especialidad_idespecialidad = $especialidad->getEspecialidad_idespecialidad();

        $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt->bindParam(':especialidad_idespecialidad', $especialidad_idespecialidad, PDO::PARAM_INT);
        $stmt->bindParam(':idususario', $idususario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }


}
?>