<?php

require 'db.php';

header('Content-Type: application/json');

// Obtener el método de la solicitud (POST, GET, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Función para devolver una respuesta JSON
function responder($mensaje, $codigo = 200) {
    http_response_code($codigo);
    echo json_encode($mensaje);
    exit();
}

switch ($method) {
    case 'POST':
        // Crear un nuevo usuario
        $data = json_decode(file_get_contents("php://input"), true);

        $nombre = $data['nombre'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $email, $password]);

        $id_usuario = $conn->lastInsertId();
        
        if ($id_usuario) {
            responder(array('id_usuario' => $id_usuario, 'mensaje' => 'Usuario creado correctamente.'));
        } else {
            responder(array('error' => 'Error al crear el usuario.'), 500);
        }

    case 'GET':
        // Obtener información de un usuario específico
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT id, nombre, email FROM usuarios WHERE id = ?");
            $stmt->execute([$id]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                responder($usuario);
            } else {
                responder(array('error' => 'Usuario no encontrado.'), 404);
            }
        } else {
            responder(array('error' => 'Parámetros insuficientes.'), 400);
        }

    case 'PUT':
        // Actualizar la información de un usuario
        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'];
        $nombre = $data['nombre'];
        $email = $data['email'];

        $stmt = $conn->prepare("UPDATE usuarios SET nombre=?, email=? WHERE id=?");
        $stmt->execute([$nombre, $email, $id]);

        if ($stmt->rowCount() > 0) {
            responder(array('mensaje' => 'Usuario actualizado correctamente.'));
        } else {
            responder(array('error' => 'Error al actualizar el usuario.'), 500);
        }

    case 'DELETE':
        // Eliminar un usuario
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id'])) {
            $id = $data['id'];

            $stmt = $conn->prepare("DELETE FROM usuarios WHERE id=?");
            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                responder(array('mensaje' => 'Usuario eliminado correctamente.'));
            } else {
                responder(array('error' => 'Error al eliminar el usuario.'), 500);
            }
        } else {
            responder(array('error' => 'Parámetros insuficientes.'), 400);
        }

    default:
        responder(array('error' => 'Método no permitido.'), 405);
}
?>
