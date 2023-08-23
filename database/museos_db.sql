CREATE DATABASE museos_db;

USE museos_db;

CREATE TABLE usuario (
	codigo INT NOT NULL auto_increment,
    usuario varchar(50) NOT NULL,
    clave varchar(50) NOT NULL,
    primary key(codigo)
);

CREATE TABLE reservaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    cantidad INT NOT NULL
);

create table evento(
	codigo INT NOT NULL auto_increment,
    nombre VARCHAR (20),
    descripcion VARCHAR (200),
    duracion VARCHAR (100),
	primary key(codigo)
);


INSERT INTO usuario (usuario, clave) VALUES ("Carlos777", "777");
INSERT INTO usuario (usuario, clave) VALUES ("Mario888", "888");
INSERT INTO usuario (usuario, clave) VALUES ("Ana999", "999");


INSERT INTO evento (nombre, descripcion, duracion)
VALUES ('Concierto de Verano', 'Disfruta de una noche llena de música y diversión', '3 horas');

select * from evento