<?php
include 'ConexionBD.php';

// Obtener todos los contactos de la base de datos
$sql = "SELECT * FROM contacto";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agenda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Agenda</h2>
        <a href="agregar.php" class="btn btn-primary mb-3">Agregar Nuevo Contacto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Género</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>LinkedIn</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los datos de los contactos en la tabla
                if ($resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["id"] . "</td>";
                        echo "<td>" . $fila["nombres"] . "</td>";
                        echo "<td>" . $fila["apaterno"] . "</td>";
                        echo "<td>" . $fila["amaterno"] . "</td>";
                        echo "<td>" . $fila["genero"] . "</td>";
                        echo "<td>" . $fila["fecha_nacimiento"] . "</td>";
                        echo "<td>" . $fila["telefono"] . "</td>";
                        echo "<td>" . $fila["email"] . "</td>";
                        echo "<td>" . $fila["linkedin"] . "</td>";
                        echo "<td>";
                        echo "<a href='editar.php?id=" . $fila["id"] . "' class='btn btn-warning btn-sm'>Editar</a> ";
                        echo "<a href='eliminar.php?id=" . $fila["id"] . "' class='btn btn-danger btn-sm'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No se encontraron contactos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>