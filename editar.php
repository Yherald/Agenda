<?php
include 'ConexionBD.php';


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos del contacto a editar
    $sql = "SELECT * FROM contacto WHERE id = $id";
    $resultado = $conn->query($sql);
    
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        // Asignar los datos a variables para prellenar el formulario
        $nombres = $fila["nombres"];
        $apaterno = $fila["apaterno"];
        $amaterno = $fila["amaterno"];
        $genero = $fila["genero"];
        $fecha_nacimiento = $fila["fecha_nacimiento"];
        $telefono = $fila["telefono"];
        $email = $fila["email"];
        $linkedin = $fila["linkedin"];
    } else {
        echo "No se encontró el contacto.";
        exit();
    }
}

if(isset($_POST['editar'])) {
    // Recibir los datos del formulario
    // Actualizar los datos en la base de datos
    // Redireccionar a index.php después de la edición
    $nombres = $_POST['nombres'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $linkedin = $_POST['linkedin'];

    $sql = "UPDATE contacto SET nombres='$nombres', apaterno='$apaterno', amaterno='$amaterno', genero='$genero', fecha_nacimiento='$fecha_nacimiento', telefono='$telefono', email='$email', linkedin='$linkedin' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el contacto: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Contacto</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>" required>
            </div>
            <div class="form-group">
                <label for="apaterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apaterno" name="apaterno" value="<?php echo $apaterno; ?>" required>
            </div>
            <div class="form-group">
                <label for="amaterno">Apellido Materno:</label>
                <input type="text" class="form-control" id="amaterno" name="amaterno" value="<?php echo $amaterno; ?>">
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select class="form-control" id="genero" name="genero">
                    <option value="Masculino" <?php if($genero == "Masculino") echo "selected"; ?>>Masculino</option>
                    <option value="Femenino" <?php if($genero == "Femenino") echo "selected"; ?>>Femenino</option>
                    <option value="Otro" <?php if($genero == "Otro") echo "selected"; ?>>Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn:</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo $linkedin; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="editar">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>

