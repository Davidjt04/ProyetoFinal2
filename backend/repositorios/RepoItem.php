<?php


class RepoItem{
    //FIND BY ID 
    public function findById($id){
        //metemos la conexion
        $conexion = Conexion::getConection();
        //creamos el objeto stmt
        $stmt = $conexion->prepare("SELECT * FROM item WHERE iditem = ?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute(); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            return new Item($row['iditem'],$row['descripcion'],$row['peso'],$row['gradosConsecucion'],$row['prueba_idprueba']);
        }
    }

    public function findAll(){
        $conexion = Conexion::getConection();
        $stmt = $conexion->query("SELECT * FROM item");
        //creo el array donde meteré todas las tupplas
        $items = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $items[] = new Item($row['iditem'], $row['descripcion'],$row['peso'],$row['gradosConsecucion'],$row['prueba_idprueba']);
        }
        return $items;
    }

    public function delete($id){
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare('DELETE FROM item WHERE iditem = ?');
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function crear(Item $item) {
        // Verificamos si el alérgeno con este ID ya existe
        $idItem = $this->findById($item->getIditem());

        if ($idItem) {
            // Si existe, hacemos un update
            return $this->update($item);
        } else {
            // Si no existe, hacemos un create
            $conexion = Conexion::getConection();
            $stmt = $conexion->prepare("INSERT INTO item (iditem, descripcion, peso, gradosConsecucion, prueba_idprueba) 
            VALUES (:iditem,:descripcion, :peso, :gradosConsecucion :prueba_idprueba)");

            $iditem = $item->getIditem();
            $descripcion = $item->getDescripcion();
            $peso = $item->getPeso();
            $gradosConsecucion = $item->getGradosConsecucion();
            $prueba_idprueba = $item->getPruebaIdprueba();

            $stmt->bindParam(':iditem', $iditem, PDO::PARAM_INT);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':peso', $peso, PDO::PARAM_INT);
            $stmt->bindParam(':gradosConsecucion', $gradosConsecucion, PDO::PARAM_INT);
            $stmt->bindParam(':prueba_idprueba', $prueba_idprueba, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->rowCount() > 0;
        }
    }

    public function update(Item $item) {
        $conexion = Conexion::getConection();
        $stmt = $conexion->prepare("UPDATE item SET descripcion = :descripcion , peso = :peso , gradosConsecucion = :gradosConsecucion , prueba_idprueba = :prueba_idprueba 
        WHERE iditem = :iditem");

        $iditem = $item->getIditem();
        $descripcion = $item->getDescripcion();
        $peso = $item->getPeso();
        $gradosConsecucion = $item->getGradosConsecucion();
        $prueba_idprueba = $item->getPruebaIdprueba();
        
        $stmt->bindParam(':iditem', $iditem, PDO::PARAM_INT);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':peso', $peso, PDO::PARAM_INT);
        $stmt->bindParam(':gradosConsecucion', $gradosConsecucion, PDO::PARAM_INT);
        $stmt->bindParam(':prueba_idprueba', $prueba_idprueba, PDO::PARAM_INT);

        return $stmt->rowCount() > 0;
    }


}
?>