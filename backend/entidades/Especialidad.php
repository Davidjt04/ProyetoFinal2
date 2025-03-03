<?php
class Especialidad{
    public int $idespecialidad;
    public String $nombre;
    public String $codigo;
    

public function __construct($idespecialidad, $nombre, $codigo){
    $this->idespecialidad = $idespecialidad;
    $this->nombre = $nombre;
    $this->codigo = $codigo;
}   

// Getter y Setter para idespecialidad
public function getIdespecialidad(): int {
    return $this->idespecialidad;
}

public function setIdespecialidad(int $idespecialidad): void {
    $this->idespecialidad = $idespecialidad;
}

// Getter y Setter para nombre
public function getNombre(): string {
    return $this->nombre;
}

public function setNombre(string $nombre): void {
    $this->nombre = $nombre;
}

// Getter y Setter para codigo
public function getCodigo(): string {
    return $this->codigo;
}

public function setCodigo(string $codigo): void {
    $this->codigo = $codigo;
}







}

?>