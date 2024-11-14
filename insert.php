<?php
// Datos de conexión a la base de datos
$servername = "172.212.104.249"; // servidor donde está la base de datos
$username = "JoseMarold"; // Nombre de usuario
$password = "Virtualizacion2024"; // Contraseña de usuario
$dbname = "sys"; // nombre base de datos


// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$carnet = $_POST['carne'];
$curso = $_POST['curso'];
$nota = $_POST['nota'];

// Preparar y ejecutar la consulta
$sql = "INSERT INTO ALUMNO (nombre, apellido, carne, curso, nota) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nombre, $apellido, $carnet, $curso, $nota);

if ($stmt->execute()) {
    echo "Registro insertado correctamente.";
    header("Location: index.html");
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
    exit();
} else {
    echo "Error al insertar registro: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
