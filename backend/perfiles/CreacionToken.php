<?php
function generarJWT() {
    $key = "SECRET_KEY";  // Será la clave que verifique la BD

    // Establecer conexión con la base de datos
    $conexion = Conexion::getConection();

    // Obtenemos las credenciales del cliente desde el body de la solicitud
    $data = json_decode(file_get_contents("php://input"));
    $nombreUsu = $data->username;
    $contraUsu = $data->password;

    // Usamos una consulta preparada para evitar inyección SQL
    $stmt = $conexion->prepare("SELECT id, rol FROM usuario WHERE nombre = :nombre AND password = :password");
    $stmt->bindParam(':nombre', $nombreUsu);
    $stmt->bindParam(':password', $contraUsu);

    // Ejecutamos la consulta
    $stmt->execute();

    // Verificamos si el usuario existe
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // El usuario fue encontrado, generamos el JWT
        $payload = array(
            "id" => $usuario['id'],
            "rol" => $usuario['rol'],
        );

        // Codificamos el payload y lo retornamos como un token JWT
        $token = JWT::encode($payload, $key);

        echo json_encode(["token" => $token]); // Devolvemos el token al cliente
        return $token;
    } else {
        // Si no se encuentra el usuario, puedes retornar un error
        echo json_encode(["error" => "Credenciales incorrectas"]);
        return null;
    }
}
