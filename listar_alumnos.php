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

// Consulta para obtener los registros
$sql = "SELECT idALUMNO, nombre, apellido, carne, curso, nota FROM ALUMNO";
$result = $conn->query($sql);

// Verificar si hay registros y generarlos en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["idALUMNO"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["apellido"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["carnee"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["curso"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nota"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No hay alumnos registrados</td></tr>";
}

// Cerrar la conexión
$conn->close();
?>
