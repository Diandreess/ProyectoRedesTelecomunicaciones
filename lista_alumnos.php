<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alumnos</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Lista de Alumnos</h1>
    <table>
        <thead>
            <tr>
                <th>ID Alumno</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Carnet</th>
                <th>Curso</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'listar_alumnos.php'; ?>
        </tbody>
    </table>

    <!-- Formulario para eliminar alumno -->
    <h3>Eliminar Alumno</h3>
    <form action="eliminar_alumno.php" method="GET">
        <label for="idALUMNO">ID del Alumno:</label>
        <input type="number" id="idALUMNO" name="idALUMNO" required>
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
