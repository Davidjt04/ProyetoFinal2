<?php
class Evaluacion {
    public int $idevaluacion;
    public float $notaFinal; // Cambia "Double" por "float"
    public int $participante_idparticipante;
    public int $ususario_idususario;
    public int $prueba_idprueba;

    public function __construct($idevaluacion, $notaFinal, $participante_idparticipante, $ususario_idusario, $prueba_idprueba){
        $this->idevaluacion = $idevaluacion;
        $this->notaFinal = $notaFinal;
        $this->participante_idparticipante = $participante_idparticipante;
        $this->ususario_idususario = $ususario_idusario;
        $this->prueba_idprueba = $prueba_idprueba;
    }

    public function getIdevaluacion(): int {
        return $this->idevaluacion;
    }

    public function setIdevaluacion(int $idevaluacion): void {
        $this->idevaluacion = $idevaluacion;
    }

    // Getter y Setter para notaFinal
    public function getNotaFinal(): float { // Cambia "Double" por "float"
        return $this->notaFinal;
    }

    public function setNotaFinal(float $notaFinal): void { // Cambia "Double" por "float"
        $this->notaFinal = $notaFinal;
    }

    // Getter y Setter para participante_idparticipante
    public function getParticipanteIdparticipante(): int {
        return $this->participante_idparticipante;
    }

    public function setParticipanteIdparticipante(int $participante_idparticipante): void {
        $this->participante_idparticipante = $participante_idparticipante;
    }

    // Getter y Setter para ususario_idususario
    public function getUsusarioIdususario(): int {
        return $this->ususario_idususario;
    }

    public function setUsusarioIdususario(int $ususario_idususario): void {
        $this->ususario_idususario = $ususario_idususario;
    }

    // Getter y Setter para prueba_idprueba
    public function getPruebaIdprueba(): int {
        return $this->prueba_idprueba;
    }

    public function setPruebaIdprueba(int $prueba_idprueba): void {
        $this->prueba_idprueba = $prueba_idprueba;
    }
}
