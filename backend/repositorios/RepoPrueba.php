<?php


class RepoPrueba{
    //FIND BY ID 
    public function findById($id){
        //metemos la conexion
        $conexion = Conexion::getConection();
        //creamos el objeto stmt
        $stmt = $conexion->prepare("SELECT * FROM prueba WHERE idprueba = ?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute(); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            return new Prueba($row['idprueba'],$row['enunciado'],$row['puntuacionMaxima'],$row['especialidad_idespecialidad']);
        }
    }

    public function findAll(){
        $conexion = Conexion::getConection();
        $stmt = $conexion->query("SELECT * FROM prueba");
        //creo el array donde meteré todas las tupplas
        $pruebas = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $pruebas[] = new Prueba($row['idprueba'],$row['enunciado'],$row['puntuacionMaxima'],$row['especialidad_idespecialidad']);
        }
        return $pruebas;
    }

    public function delete($id){
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare('DELETE FROM prueba WHERE idprueba = ?');
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function crear(Prueba $prueba) {
        // Verificamos si el alérgeno con este ID ya existe
        $idPrueba = $this->findById($prueba->getIdprueba());

        if ($idPrueba) {
            // Si existe, hacemos un update
            return $this->update($prueba);
        } else {
            // Si no existe, hacemos un create
            $conexion = Conexion::getConection();
            $stmt = $conexion->prepare("INSERT INTO prueba (idprueba, enunciado, puntuacionMaxima, especialidad_idespecialidad) 
            VALUES (:idprueba, :enunciado, :puntuacionMaxima, :especialidad_idespecialidad)");

            $idprueba = $idprueba->idprueba();
            $enunciado = $especialidad->getEnunciado();
            $puntuacionMaxima = $especialidad->especialidad();
            $especialidad_idespecialidad = $especialidad->getEspecialidadIdespecialidad();

            $stmt->bindParam(':idprueba', $idprueba, PDO::PARAM_INT);
            $stmt->bindParam(':enunciado', $enunciado);
            $stmt->bindParam(':puntuacionMaxima', $puntuacionMaxima);
            $stmt->bindParam(':especialidad_idespecialidad', $especialidad_idespecialidad, PDO::PARAM_INT);

            $stmt->execute();
            

            return $stmt->rowCount() > 0;
        }
    }

    public function update(Prueba $prueba) {
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare("UPDATE prueba SET enunciado = :enunciado, puntuacionMaxima = :puntuacionMaxima, especialidad_idespecialidad = :especialidad_idespecialidad
            WHERE idprueba = :idprueba");

        $idprueba = $idprueba->idprueba();
        $enunciado = $especialidad->getEnunciado();
        $puntuacionMaxima = $especialidad->especialidad();
        $especialidad_idespecialidad = $especialidad->getEspecialidadIdespecialidad();

        $stmt->bindParam(':enunciado', $enunciado);
        $stmt->bindParam(':puntuacionMaxima', $puntuacionMaxima);
        $stmt->bindParam(':especialidad_idespecialidad', $especialidad_idespecialidad, PDO::PARAM_INT);
        $stmt->bindParam(':idprueba', $idprueba, PDO::PARAM_INT);


        $stmt->execute();

        return $stmt->rowCount() > 0;
    }


}
?>