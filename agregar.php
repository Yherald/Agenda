<?php
include 'ConexionBD.php';


if(isset($_POST['agregar'])) {
    $nombres = $_POST['nombres'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $linkedin = $_POST['linkedin'];

    $sql = "INSERT INTO contacto (nombres, apaterno, amaterno, genero, fecha_nacimiento, telefono, email, linkedin)
    VALUES ('$nombres', '$apaterno', '$amaterno', '$genero', '$fecha_nacimiento', '$telefono', '$email', '$linkedin')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Contacto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar Contacto</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" required>
            </div>
            <div class="form-group">
                <label for="apaterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apaterno" name="apaterno" required>
            </div>
            <div class="form-group">
                <label for="amaterno">Apellido Materno:</label>
                <input type="text" class="form-control" id="amaterno" name="amaterno">
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select class="form-control" id="genero" name="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn:</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin">
            </div>
            <button type="submit" class="btn btn-primary" name="agregar">Agregar</button>
        </form>
    </div>
</body>
</html>
