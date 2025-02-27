<?php
// Incluimos la clase de conexión
include 'repositorios/Conexion.php';
include "repositorios/RepoEspecialidad.php";
include "repositorios/RepoUsuario.php";

include "entidades/Especialidad.php";
include "entidades/Usuario.php";



$repo = new RepoEspecialidad();         
// $repo = new RepoUsuario();

// $especialidad = new Especialidad("cccc","aaba");



$especialidad1 = $repo->findById(4);
if ($especialidad1) {
    echo "<pre>";
    print_r($especialidad1);  // Imprimir los resultados
    echo "</pre>";
} else {
    echo "No se encontraron alérgenos.";
}