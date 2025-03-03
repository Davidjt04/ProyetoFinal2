<?php
use \Firebase\JWT\JWT;

// Middleware para verificar el rol del usuario
//obtengo el token 

function verificarAdmin($requiredRole) {
    $jwt = $_SERVER['HTTP_AUTHORIZATION'];  
    //Si no tenemos token esa persona no esta autorizada para entrar a nuestra web 
    if (!$jwt) {
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(["error" => "Token no proporcionado"]);
        exit();
    }
    try {
        // Decodificar el JWT (usa la librería JWT que has instalado)
        $decoded = JWT::decode($jwt, "SECRET_KEY", array('HS256'));
        $userRole = $decoded->rol;  // El rol del usuario en el JWT

        // Verificar si el usuario tiene el rol requerido
        if ($userRole != $requiredRole && $requiredRole != 'administrador') {
            header("HTTP/1.1 403 Forbidden");
            echo json_encode(["error" => "No tienes permisos para acceder a este recurso"]);
            exit();
        }

    } catch (Exception $e) {
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(["error" => "Token inválido o expirado"]);
        exit();
    }
}
function verificarExperto($requiredRole) {
    $jwt = $_SERVER['HTTP_AUTHORIZATION'];  
    //Si no tenemos token esa persona no esta autorizada para entrar a nuestra web 
    if (!$jwt) {
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(["error" => "Token no proporcionado"]);
        exit();
    }
    try {
        // Decodificar el JWT (usa la librería JWT que has instalado)
        $decoded = JWT::decode($jwt, "SECRET_KEY", array('HS256'));
        $userRole = $decoded->rol;  // El rol del usuario en el JWT

        // Verificar si el usuario tiene el rol requerido
        if ($userRole != $requiredRole && $requiredRole != 'experto' || $userRole != $requiredRole && $requiredRole != 'administrador') {
            header("HTTP/1.1 403 Forbidden");
            echo json_encode(["error" => "No tienes permisos para acceder a este recurso"]);
            exit();
        }

    } catch (Exception $e) {
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(["error" => "Token inválido o expirado"]);
        exit();
    }
}
function verificarCompetidor($requiredRole) {
    $jwt = $_SERVER['HTTP_AUTHORIZATION'];  
    //Si no tenemos token esa persona no esta autorizada para entrar a nuestra web 
    if (!$jwt) {
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(["error" => "Token no proporcionado"]);
        exit();
    }
    try {
        // Decodificar el JWT (usa la librería JWT que has instalado)
        $decoded = JWT::decode($jwt, "SECRET_KEY", array('HS256'));
        $userRole = $decoded->rol;  // El rol del usuario en el JWT

        // Verificar si el usuario tiene el rol requerido
        if ($userRole != $requiredRole && $requiredRole != 'anonimo') {
            header("HTTP/1.1 403 Forbidden");
            echo json_encode(["error" => "No tienes permisos para acceder a este recurso"]);
            exit();
        }

    } catch (Exception $e) {
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(["error" => "Token inválido o expirado"]);
        exit();
    }
}
//ENDPOINTS
function VerificarRoles() {
    // Definir un arreglo con los endpoints y los métodos requeridos para cada uno
    $rutasProtegidasAdmin = [
        '/crear-edit-especialidad' => 'POST',
        '/listar-especialidad' => 'GET',
        '/crear-edit-expertos' => 'POST',
        '/listar-expertos' => 'GET',
        '/listar-mejor' => 'GET'
    ];

    $rutasProtegidasExperto = [
        '/listar-especialidad' => 'GET',
        '/crear-edit-competidor' => 'POST',
        '/crear-edit-ptos-competidor' => 'POST',
        '/listar-competidor' => 'GET',
        '/listar-ptos' => 'GET'
    ];

    // Verificar si la URI y el método coinciden con alguna de las rutas protegidas
    if (array_key_exists($_SERVER['REQUEST_URI'], $rutasProtegidasAdmin) && $_SERVER['REQUEST_METHOD'] == $rutasProtegidas[$_SERVER['REQUEST_URI']]) {
        verificarRol('admin');  // Solo el rol 'admin' puede acceder a estos recursos
    } else {
        echo json_encode(["error" => "No tienes permisos para acceder a este recurso"]);
        exit();
    }
    if (array_key_exists($_SERVER['REQUEST_URI'], $rutasProtegidasExperto) && $_SERVER['REQUEST_METHOD'] == $rutasProtegidas[$_SERVER['REQUEST_URI']]) {
        verificarRol('experto');  // Solo el rol 'admin' puede acceder a estos recursos
    } else {
        echo json_encode(["error" => "No tienes permisos para acceder a este recurso"]);
        exit();
    }
}
