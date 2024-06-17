<?php
$servername = "localhost";
$username = "jennifer";
$password = "admin123456789";
$dbname = "proyecto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Cargar el archivo XML
$xml = simplexml_load_file('datos.xml') or die("No se puede abrir el archivo XML.");

// Iterar sobre los elementos del XML
foreach ($xml->Fila as $fila) {
    $columna1 = $fila->Columna1;
    $columna2 = $fila->Columna2;
    $columna3 = $fila->Columna3;
    // Añade más columnas según sea necesario

    $sql = "INSERT INTO mi_tabla (Columna1, Columna2, Columna3) VALUES ('$columna1', '$columna2', '$columna3')";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado con éxito\n";
    } else {
        echo "Error: " . $sql . "\n" . $conn->error;
    }
}

$conn->close();
?>