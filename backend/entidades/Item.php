<?php
class Item{
    private int $iditem;
    private String $descripcion;
    private int $peso;
    private int $gradosConsecucion;
    private int $prueba_idprueba;

// Constructor
public function __construct(int $iditem, string $descripcion, int $peso, int $gradosConsecucion, int $prueba_idprueba) {
    $this->iditem = $iditem;
    $this->descripcion = $descripcion;
    $this->peso = $peso;
    $this->gradosConsecucion = $gradosConsecucion;
    $this->prueba_idprueba = $prueba_idprueba;
}

// Getter y Setter para iditem
public function getIditem(): int {
    return $this->iditem;
}

public function setIditem(int $iditem): void {
    $this->iditem = $iditem;
}

// Getter y Setter para descripcion
public function getDescripcion(): string {
    return $this->descripcion;
}

public function setDescripcion(string $descripcion): void {
    $this->descripcion = $descripcion;
}

// Getter y Setter para peso
public function getPeso(): int {
    return $this->peso;
}

public function setPeso(int $peso): void {
    $this->peso = $peso;
}

// Getter y Setter para gradosConsecucion
public function getGradosConsecucion(): int {
    return $this->gradosConsecucion;
}

public function setGradosConsecucion(int $gradosConsecucion): void {
    $this->gradosConsecucion = $gradosConsecucion;
}

// Getter y Setter para prueba_idprueba
public function getPruebaIdprueba(): int {
    return $this->prueba_idprueba;
}

public function setPruebaIdprueba(int $prueba_idprueba): void {
    $this->prueba_idprueba = $prueba_idprueba;
}
}




