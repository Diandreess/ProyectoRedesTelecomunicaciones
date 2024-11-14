<?php
// Datos de conexión a la base de datos
$servername = "172.212.104.249"; // servidor donde está la base de datos
$username = "JoseMarold"; // Nombre de usuario
$password = "Virtualizacion2024"; // Contraseña de usuario
$dbname = "sys"; // nombre base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el idALUMNO desde el formulario
if (isset($_GET['idALUMNO'])) {
    $idALUMNO = intval($_GET['idALUMNO']);

    // Preparar y ejecutar la consulta de eliminación
    $sql = "DELETE FROM alumnos WHERE idALUMNO = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idALUMNO);

    if ($stmt->execute()) {
        echo "Alumno eliminado exitosamente.";
        header("Location: index.html");
        // Cerrar la conexión
        $stmt->close();
        $conn->close();
        exit();
    } else {
        echo "Error al eliminar el alumno: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID de alumno no especificado.";
}

// Cerrar la conexión
$conn->close();
?>
