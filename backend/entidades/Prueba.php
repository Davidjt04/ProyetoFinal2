<?php
class Prueba{
    private int $idprueba;
    private Double $enunciado;
    private Double $puntuacionMaxima;
    private int $especialidad_idespecialidad;


    // Constructor
    public function __construct(int $idprueba, float $enunciado, float $puntuacionMaxima, int $especialidad_idespecialidad) {
        $this->idprueba = $idprueba;
        $this->enunciado = $enunciado;
        $this->puntuacionMaxima = $puntuacionMaxima;
        $this->especialidad_idespecialidad = $especialidad_idespecialidad;
    }

    // Getter y Setter para idprueba
    public function idprueba(): int {
        return $this->idprueba;
    }

    public function setIdprueba(int $idprueba): void {
        $this->idprueba = $idprueba;
    }

    // Getter y Setter para enunciado
    public function getEnunciado(): float {
        return $this->enunciado;
    }

    public function setEnunciado(float $enunciado): void {
        $this->enunciado = $enunciado;
    }

    // Getter y Setter para puntuacionMaxima
    public function getPuntuacionMaxima(): float {
        return $this->puntuacionMaxima;
    }

    public function setPuntuacionMaxima(float $puntuacionMaxima): void {
        $this->puntuacionMaxima = $puntuacionMaxima;
    }

    // Getter y Setter para especialidad_idespecialidad
    public function getEspecialidadIdespecialidad(): int {
        return $this->especialidad_idespecialidad;
    }

    public function setEspecialidadIdespecialidad(int $especialidad_idespecialidad): void {
        $this->especialidad_idespecialidad = $especialidad_idespecialidad;
    }



}