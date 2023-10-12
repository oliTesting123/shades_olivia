<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llamar a la función PHP desde HTML</title>
</head>
<body>

<h1>Llamando a la función PHP desde HTML</h1>

<?php
include('suma.php');
$resultado = sumar(5, 3);

echo "<p>La suma de 5 y 3 es: $resultado</p>";
?>


<h2>Recorrido de un arrar para encontrar los numeros pares:</h2>

<?php
$numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

foreach ($numeros as $numero) {
    if ($numero % 2 === 0) {
        echo $numero . " ";
    }
}
?>

<h2>Diferencia entre variables globales y variables locales:</h2>
<p>La variable local se declara dentro de una funcion y solo esta dispible dentro de la funcion</p>
<br>
<p>Las variabes globales pueden ser declaradas fuera de las funciones y se puede acceder a ella en cualquier escript, incluso en funciones</p>

<h2>Lectura de archivo llamado datos.txt y su contenido </h2>

<?php
// Nombre del archivo
$nombre_archivo = 'datos.txt';

// Verificar si el archivo existe
if (file_exists($nombre_archivo)) {
    // Leer el contenido del archivo
    $contenido = file_get_contents($nombre_archivo);

    // Mostrar el contenido en el navegador
    echo "<pre>$contenido</pre>";
} else {
    echo "<p>El archivo $nombre_archivo no existe.</p>";
}
?>
<br></br>

<h2>Consulta SQL para actualizar el campo "nombre" de una tabla llamada "productos" y establecerlo como "Nuevo Producto" donde el campo "id" sea igual a 5.</h2>
<p>UPDATE productos
SET nombre = 'Nuevo Producto'
WHERE id = 5;</p>


<h2>Mostrar lainformacion del coche:</h2>
<?php
include('coche.php');

// Llamar al método para mostrar la información del coche
$miCoche->mostrarInformacion();

?>
</body>
</html>
