<?php
use \Firebase\JWT\JWT;

function generarJWT($usuario) {
    $key = "SECRET_KEY";  // sera la clave que verifique la bd 
    $issuedAt = time();
    $payload = array(
        "id" => $usuario['id'],
        "rol" => $usuario['rol'],
        "iat" => $issuedAt,
    );

    return JWT::encode($payload, $key);
}
