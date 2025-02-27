<?php
class Usuario{
    private int $idususario;
    private String $rol;
    private String $usuario;
    private String $password;
    private String $nombre;
    private String $apellidos;
    private String $dni;
    private int $especialidad_idespecialidad;


// Constructor
public function __construct(int $idususario, string $rol, string $usuario, string $password, string $nombre, string $apellidos, string $dni,int $especialidad_idespecialidad) {
    $this->idususario = $idususario;
    $this->rol = $rol;
    $this->usuario = $usuario;
    $this->password = $password;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->dni = $dni;
    $this->especialidad_idespecialidad = $especialidad_idespecialidad;
}

// Getter y Setter para idususario
public function getEspecialidad_idespecialidad(): int {
    return $this->especialidad_idespecialidad;
}

public function getIdUsuario(): string {
    return $this->idususario;
}

public function setIdususario(int $idususario): void {
    $this->idususario = $idususario;
}

// Getter y Setter para rol
public function getRol(): string {
    return $this->rol;
}

public function setRol(string $rol): void {
    $this->rol = $rol;
}

// Getter y Setter para usuario
public function getUsuario(): string {
    return $this->usuario;
}

public function setUsuario(string $usuario): void {
    $this->usuario = $usuario;
}

// Getter y Setter para password
public function getPassword(): string {
    return $this->password;
}

public function setPassword(string $password): void {
    $this->password = $password;
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

// Getter y Setter para dni
public function getDni(): string {
    return $this->dni;
}

public function setDni(string $dni): void {
    $this->dni = $dni;
}
}

