<?php
// Incluimos la clase de conexión
// require_once 'Autoload.php';
include 'repositorios/Conexion.php';
include "repositorios/RepoEspecialidad.php";
include "repositorios/RepoUsuario.php";
include "repositorios/RepoEvaluacion.php";

include "entidades/Especialidad.php";
include "entidades/Usuario.php";
include "entidades/Evaluacion.php";

require_once 'api/ApiEspecialidad.php';
require_once 'api/ApiEvaluacion.php';

require_once 'controladores/ControlEspecialidad.php';
require_once 'controladores/ControlEvaluacion.php';

require_once 'servicios/ServicioEspecialidad.php';
require_once 'servicios/ServicioEvaluacion.php';


// Obtener la ruta de la URL
$request_uri = $_SERVER['REQUEST_URI'];  // Esto captura la URL solicitada
$request_method = $_SERVER['REQUEST_METHOD'];  // Verbo HTTP (GET, POST, DELETE)


//switch con la accion que quiera realizar y despues la entidad a cambiar
//dentro del switch coges la api que corresponda segun la entidad a modificar 
//segun la accion haces un delete get o post 

//Extraigo la parte del endpoint de la url 
$endpoint = parse_url($request_uri, PHP_URL_PATH);
$endpoint = ltrim($endpoint, '/');
$query = parse_url($request_uri, PHP_URL_QUERY);



$entidad = $_GET['entidad'];
//hay que saber dos cosas la entidad y mandarlo a la api 
switch ($entidad) {
    case 'especialidad':
        $api = new ApiEspecialidad(new ControlEspecialidad(new ServicioEspecialidad(new RepoEspecialidad())));
        $api->manejarSolicitud();
        break;
    case 'evaluacion':
        $api = new ApiEvaluacion(new ControlEvaluacion(new ServicioEvaluacion(new RepoEvaluacion())));
        $api->manejarSolicitud();
        break;
    case 'item':
        $api = new ApiItem(new ControlItem(new ServicioItem(new RepoItem())));
        $api->manejarSolicitud();
        break;
    case 'participante':
        $api = new ApiParticipante(new ControlParticipante(new ServicioParticipante(new RepoParticipante())));
        $api->manejarSolicitud();
        break;
    case 'prueba':
        $api = new ApiPrueba(new ControlPrueba(new ServicioPrueba(new RepoPrueba())));
        $api->manejarSolicitud();
        break;
    case 'usuario':
        $api = new ApiUsuario(new ControlUsuario(new ServicioUsuario(new RepoUsuario())));
        $api->manejarSolicitud();
        break;
}




