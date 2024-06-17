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

$sql = "SELECT * FROM mi_tabla";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear el elemento raíz
    $xml = new SimpleXMLElement('<Datos/>');

    // Iterar sobre los resultados
    while($row = $result->fetch_assoc()) {
        $fila = $xml->addChild('Fila');
        foreach ($row as $columna => $valor) {
            $fila->addChild($columna, htmlspecialchars($valor));
        }
    }

    // Guardar XML en un archivo
    $xml->asXML('datos.xml');
    echo "Datos exportados a datos.xml";
} else {
    echo "0 resultados";
}

$conn->close();
?>