<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>
<body>

<h1>Gestión de Usuarios</h1>

<!-- Formulario para crear un nuevo usuario -->
<form action="usuarios.php" method="post">
    <h2>Crear Nuevo Usuario</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" required>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    <button type="submit">Crear Usuario</button>
</form>

<!-- Formulario para obtener información de un usuario -->
<form action="usuarios.php" method="get">
    <h2>Obtener Información de Usuario</h2>
    <label for="id">ID del Usuario:</label>
    <input type="number" name="id" required>
    <button type="submit">Obtener Información</button>
</form>

<!-- Formulario para actualizar la información de un usuario -->
<form action="usuarios.php" method="put">
    <h2>Actualizar Información de Usuario</h2>
    <label for="id_update">ID del Usuario:</label>
    <input type="number" name="id_update" required>
    <label for="nombre_update">Nuevo Nombre:</label>
    <input type="text" name="nombre_update" required>
    <label for="email_update">Nuevo Correo Electrónico:</label>
    <input type="email" name="email_update" required>
    <button type="submit">Actualizar Usuario</button>
</form>

<!-- Formulario para eliminar un usuario -->
<form action="usuarios.php" method="delete">
    <h2>Eliminar Usuario</h2>
    <label for="id_delete">ID del Usuario:</label>
    <input type="number" name="id_delete" required>
    <button type="submit">Eliminar Usuario</button>
</form>

</body>
</html>
