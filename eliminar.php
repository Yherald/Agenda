<?php
include 'ConexionBD.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos del contacto a eliminar
    $sql = "SELECT * FROM contacto WHERE id = $id";
    $resultado = $conn->query($sql);
    
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        // Asignar los datos a variables para mostrarlos en el mensaje de confirmación
        $nombres = $fila["nombres"];
        $apaterno = $fila["apaterno"];
        $amaterno = $fila["amaterno"];
    } else {
        echo "No se encontró el contacto.";
        exit();
    }
}

if(isset($_POST['eliminar'])) {
    // Eliminar el contacto de la base de datos
    $sql = "DELETE FROM contacto WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el contacto: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Contacto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Eliminar Contacto</h2>
        <p>¿Estás seguro de que quieres eliminar el siguiente contacto?</p>
        <p><strong>Nombres:</strong> <?php echo $nombres; ?></p>
        <p><strong>Apellido Paterno:</strong> <?php echo $apaterno; ?></p>
        <p><strong>Apellido Materno:</strong> <?php echo $amaterno; ?></p>
        <form method="post" action="">
            <button type="submit" class="btn btn-danger" name="eliminar">Eliminar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>