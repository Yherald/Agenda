CREATE DATABASE agenda;
USE agenda;

CREATE TABLE contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(50),
    apaterno VARCHAR(50),
    amaterno VARCHAR(50),
    genero ENUM('Masculino', 'Femenino', 'Otro'),
    fecha_nacimiento DATE,
    telefono VARCHAR(15),
    email VARCHAR(100),
    linkedin VARCHAR(100)
);