CREATE DATABASE museos_db;

USE museos_db;

CREATE TABLE museos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE precios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    museo_id INT,
    tipo_entrada VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (museo_id) REFERENCES museos(id)
);

CREATE TABLE usuario (
	codigo INT NOT NULL auto_increment,
    usuario varchar(50) NOT NULL,
    clave varchar(50) NOT NULL,
    primary key(codigo)
);
drop table usuario;
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

INSERT INTO evento (nombre, descripcion, duracion)
VALUES ('Concierto de Verano', 'Disfruta de una noche llena de música y diversión', '3 horas');

select * from evento;

INSERT INTO usuario (usuario, correo, clave) VALUES
    ('Daniel Torres', 'dTorres@gmail.com', 'ddd'),
    ('Adrian Lopez', 'aLopez@gmail.com','aaa'),
    ('Maria Campos','mCampos@gmail.com','mmm'),
    ('Valeria García','vGarcia@gmail.com','vvv');
INSERT INTO usuario (usuario, clave) VALUES ("Carlos777", "777");
INSERT INTO usuario (usuario, clave) VALUES ("Mario888", "888");
INSERT INTO usuario (usuario, clave) VALUES ("Ana999", "999");

INSERT INTO museos (nombre) VALUES
    ('Museo de los niños'),
    ('Museo Nacional'),
    ('Museo de Jade'),
    ('Museo de la Cultura Pre-colombina');


INSERT INTO precios (museo_id, tipo_entrada, precio) VALUES
    (1,  'Mayores de 15 años'               , 3000.00 ),
    (1,  'Niños y niñas'                    , 2500.00 ),
    
    (2,  'Nacionales y residentes adultos'  , 2500.00 ),
    (2,  'Extranjero adulto'                , 5900.00 ),
    (2,  'Extranjero estudiante'            , 3200.00 ),
    (2,  'Menores de 12 años'               , 0.00 ),
    (2,  'Indígenas'                        , 0.00 ),
    
    (3,  'Adulto'                           , 2700.00 ),
    (3,  'Estudiantes'                      , 1000.00 ),
    (3,  'Niños de 6 a 12 años'             , 1000.00 ),
    (3,  'Menores de 5 años'                , 0.00 ),
    (3,  'Adultos mayores'                  , 0.00 ),
    (3,  'Personas con discapacidad'        , 0.00 ),
    (3,  'Extranjero adulto'                , 8600.00 ),
	(3,  'Extranjero estudiante'            , 2700.00 ),
	(3,  'Extranjero niño de 6 a 12 años'   , 1000.00 ),
	(3,  'Extranjero menor de 5 años'       , 0.00 ),
    
    (4,  'Nacionales regular'               , 3000.00 ),
    (4,  'Nacionales estudiantes'           , 1000.00 ),
    (4,  'Extranjero regular'               , 10800.00 ),
    (4,  'Extranjero estudiantes'           , 8160.00 );

select * from museos_db.precios;
select * from museos_db.museos;
select * from museos_db.usuario;