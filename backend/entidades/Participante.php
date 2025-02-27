<?php
class Participante{
    private int $idparticipante;
    private String $nombre;
    private String $apellidos;
    private String $centro;
    private int $especialidad_idespecialidad;


// Constructor
public function __construct(int $idparticipante, string $nombre, string $apellidos, string $centro, int $especialidad_idespecialidad) {
    $this->idparticipante = $idparticipante;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->centro = $centro;
    $this->especialidad_idespecialidad = $especialidad_idespecialidad;
}

// Getter y Setter para idparticipante
public function getIdparticipante(): int {
    return $this->idparticipante;
}

public function setIdparticipante(int $idparticipante): void {
    $this->idparticipante = $idparticipante;
}

// Getter y Setter para nombre
public function getNombre(): string {
    return $this->nombre;
}

public function setNombre(string $nombre): void {
    $this->nombre = $nombre;
}

// Getter y Setter para apellidos
public function getApellidos(): string {
    return $this->apellidos;
}

public function setApellidos(string $apellidos): void {
    $this->apellidos = $apellidos;
}

// Getter y Setter para ususario_idususario
public function getCentro(): string {
    return $this->centro;
}

public function setCentro(string $centro): void {
    $this->centro = $centro;
}

// Getter y Setter para especialidad_idespecialidad
public function getEspecialidadIdespecialidad(): int {
    return $this->especialidad_idespecialidad;
}

public function setEspecialidadIdespecialidad(int $especialidad_idespecialidad): void {
    $this->especialidad_idespecialidad = $especialidad_idespecialidad;
}


}