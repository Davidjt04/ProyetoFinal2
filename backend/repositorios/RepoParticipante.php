<?php


class RepoParticipante{
    //FIND BY ID 
    public function findById($id){
        //metemos la conexion
        $conexion = Conexion::getConection();
        //creamos el objeto stmt
        $stmt = $conexion->prepare("SELECT * FROM participante WHERE idparticipante = ?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute(); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            return new Participante($row['idparticipante'],$row['nombre'],$row['apellidos'],$row['centro'],$row['especialidad_idespecialidad']);
        }
    }

    public function findAll(){
        $conexion = Conexion::getConection();
        $stmt = $conexion->query("SELECT * FROM participante");
        //creo el array donde meteré todas las tupplas
        $participantes = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $participantes[] = new Participante($row['idparticipante'],$row['nombre'],$row['apellidos'],$row['centro'],$row['especialidad_idespecialidad']);
        }
        return $participantes;
    }

    public function delete($id){
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare('DELETE FROM participante WHERE idparticipante = ?');
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function crear(Participante $participante) {
        // Verificamos si el alérgeno con este ID ya existe
        $idParticipante = $this->findById($participante->getIdparticipante());

        if ($idParticipante) {
            // Si existe, hacemos un update
            return $this->update($participante);
        } else {
            // Si no existe, hacemos un create
            $conexion = Conexion::getConection();
            $stmt = $conexion->prepare("INSERT INTO participante (idparticipante, nombre, apellidos, centro, especialidad_idespecialidad) 
            VALUES (:idparticipante, :nombre, :apellidos, :centro, :especialidad_idespecialidad)");

            $nombre = $participante->getNombre();
            $apellidos = $participante->getApellidos();
            $centro = $participante->getCentro();
            $especialidad_idespecialidad = $participante->getEspecialidadIdespecialidad();


            $stmt->bindParam(':idparticipante', $idparticipante, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':centro', $centro, PDO::PARAM_STR);
            $stmt->bindParam(':especialidad_idespecialidad', $especialidad_idespecialidad, PDO::PARAM_INT);

            $stmt->execute();
            

            return $stmt->rowCount() > 0;
        }
    }

    public function update(Participante $paticipante) {
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare("UPDATE participante SET nombre = :nombre, apellidos = :apellidos, centro = :centro, especialidad_idespecialidad = :especialidad_idespecialidad 
        WHERE idparticipante = :idparticipante");

        $idParticipante = $participante->getIdparticipante();
        $nombre = $participante->getNombre();
        $apellidos = $participante->getApellidos();
        $centro = $participante->getCentro();
        $especialidad_idespecialidad = $participante->getEspecialidadIdespecialidad();

        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':centro', $centro, PDO::PARAM_STR);
        $stmt->bindParam(':especialidad_idespecialidad', $especialidad_idespecialidad, PDO::PARAM_INT);
        $stmt->bindParam(':idparticipante', $idparticipante, PDO::PARAM_INT);


        $stmt->execute();

        return $stmt->rowCount() > 0;
    }


}
?>