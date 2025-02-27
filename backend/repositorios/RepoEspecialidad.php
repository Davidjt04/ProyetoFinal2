<?php


class RepoEspecialidad{
    //FIND BY ID 
    public function findById($id){
        //metemos la conexion
        $conexion = Conexion::getConection();
        //creamos el objeto stmt
        $stmt = $conexion->prepare("SELECT * FROM especialidad WHERE idespecialidad = ?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute(); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            return new Especialidad($row['idespecialidad'],$row['nombre'],$row['codigo']);
        }
    }

    public function findAll(){
        $conexion = Conexion::getConection();
        $stmt = $conexion->query("SELECT * FROM especialidad");
        //creo el array donde meteré todas las tupplas
        $especialidades = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $especialidades[] = new Especialidad($row['idespecialidad'],$row['nombre'],$row['codigo']);
        }
        return $especialidades;
    }

    public function delete($id){
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare('DELETE FROM especialidad WHERE idespecialidad = ?');
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function crear(Especialidad $especialidad) {
        // Verificamos si el alérgeno con este ID ya existe
        $idEspecialidad = $this->findById($especialidad->getIdespecialidad());

        if ($idEspecialidad) {
            // Si existe, hacemos un update
            return $this->update($especialidad);
        } else {
            // Si no existe, hacemos un create
            $conexion = Conexion::getConection();
            $stmt = $conexion->prepare("INSERT INTO especialidad (idespecialidad, nombre, codigo) VALUES (:idespecialidad, :nombre, :codigo)");
            
            $idespecialidad = $especialidad->getIdespecialidad();
            $nombre = $especialidad->getNombre();
            $codigo = $especialidad->getCodigo();

            $stmt->bindParam(':idespecialidad', $idespecialidad, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }
    }

    public function update(Especialidad $especialidad) {
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare("UPDATE especialidad SET codigo = :codigo, nombre = :nombre WHERE idespecialidad = :idespecialidad");

        $idespecialidad = $especialidad->getIdespecialidad();
        $codigo = $especialidad->getCodigo();
        $nombre = $especialidad->getNombre();

        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':idespecialidad', $idespecialidad, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }


}
?>