<?php


class RepoEvaluacion{
    //FIND BY ID 
    public function findById($id){
        //metemos la conexion
        $conexion = Conexion::getConection();
        //creamos el objeto stmt
        $stmt = $conexion->prepare("SELECT * FROM evaluacion WHERE idevaluacion = ?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute(); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            return new Evaluacion($row['idevaluacion'],$row['notaFinal'],$row['participante_idparticipante'],$row['ususario_idususario'],$row['prueba_idprueba']);
        }
    }

    public function findAll(){
        $conexion = Conexion::getConection();
        $stmt = $conexion->query("SELECT * FROM evaluacion");
        //creo el array donde meteré todas las tupplas
        $evaluaciones = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $evaluaciones[] = new Evaluacion($row['idevaluacion'],$row['notaFinal'],$row['participante_idparticipante'],$row['ususario_idususario'],$row['prueba_idprueba']);
        }
        return $evaluaciones;
    }

    public function delete($id){
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare('DELETE FROM evaluacion WHERE idevaluacion = ?');
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function crear(Evaluacion $evaluacion) {
        // Verificamos si el alérgeno con este ID ya existe
        $idEvaluacion = $this->findById($evaluacion->getIdevaluacion());

        if ($idEvaluacion) {
            // Si existe, hacemos un update
            return $this->update($evaluacion);
        } else {
            // Si no existe, hacemos un create
            $conexion = Conexion::getConection();
            $stmt = $conexion->prepare("INSERT INTO evaluacion (idevaluacion, notaFinal, participante_idparticipante, ususario_idususario, prueba_idprueba) 
            VALUES (:idevaluacion, :notaFinal, :participante_idparticipante, :ususario_idususario, :prueba_idprueba)");

            $idevaluacion = $evaluacion->getIdespecialidad();
            $notaFinal = $evaluacion->getNotaFinal();
            $participante_idparticipante = $evaluacion->getParticipanteIdparticipante();
            $ususario_idususario = $evaluacion->getUsusarioIdususario();
            $prueba_idprueba = $evaluacion->getPruebaIdprueba();

            $stmt->bindParam(':idevaluacion', $idevaluacion, PDO::PARAM_INT);
            $stmt->bindParam(':notaFinal', $notaFinal);
            $stmt->bindParam(':participante_idparticipante', $participante_idparticipante, PDO::PARAM_INT);
            $stmt->bindParam(':ususario_idususario', $ususario_idususario, PDO::PARAM_INT);
            $stmt->bindParam(':prueba_idprueba', $prueba_idprueba, PDO::PARAM_INT);

            $stmt->execute();
            

            return $stmt->rowCount() > 0;
        }
    }

    public function update(Evaluacion $evaluacion) {
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare("UPDATE evaluacion SET notaFinal = :notaFinal, participante_idparticipante = :participante_idparticipante, ususario_idususario = :ususario_idususario, prueba_idprueba = :prueba_idprueba 
        WHERE idevaluacion = :idevaluacion");

        $idevaluacion = $evaluacion->getIdevaluacion();
        $notaFinal = $evaluacion->getNotaFinal();
        $participante_idparticipante = $evaluacion->getParticipanteIdparticipante();
        $ususario_idususario = $evaluacion->getUsusarioIdususario();
        $prueba_idprueba = $evaluacion->getPruebaIdprueba();

        $stmt->bindParam(':notaFinal', $notaFinal);
        $stmt->bindParam(':participante_idparticipante', $participante_idparticipante, PDO::PARAM_INT);
        $stmt->bindParam(':ususario_idususario', $ususario_idususario, PDO::PARAM_INT);
        $stmt->bindParam(':prueba_idprueba', $prueba_idprueba, PDO::PARAM_INT);
        $stmt->bindParam(':idevaluacion', $idevaluacion, PDO::PARAM_INT);


        $stmt->execute();

        return $stmt->rowCount() > 0;
    }


}
?>