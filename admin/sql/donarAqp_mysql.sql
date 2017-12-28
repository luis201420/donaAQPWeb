create database donarAQP;
use donarAQP;

create table Persona (
	  idPersona int NOT NULL ,
    Nombres varchar(45) NOT NULL,
    Apellidos varchar(45) NOT NULL,
    TipoSangre varchar(3) NOT NULL,
    Edad int NOT NULL,
    Genero varchar(45) NOT NULL,
    Correo varchar(45),
    Permisos int NOT NULL,
    Password text NOT NULL,
    PRIMARY KEY(idPersona)
);


create table CentroDonacion(
	  idCentroDonacion int NOT NULL AUTO_INCREMENT,
    nombreCentro varchar(45) NOT NULL,
    Direccion varchar(100) NOT NULL,
    Latitud float NOT NULL,
    Longitud float NOT NULL,
    Representante int NOT NULL,
    PRIMARY KEY(idCentroDonacion),
    FOREIGN KEY (Representante) REFERENCES Persona(idPersona)
);


create table Eventos(
	  idEventos int NOT NULL AUTO_INCREMENT,
    Titulo varchar(100) NOT NULL,
    Autor int NOT NULL,
    Mensaje varchar(500) NOT NULL,
    Fecha date NOT NULL,
    constraint PK_Eventos primary key(idEventos),
    constraint fk_EventosCentro foreign key(Autor) references CentroDonacion(idCentroDonacion)
);

create table Notificaciones(
	  idNotificaciones int NOT NULL AUTO_INCREMENT,
    Autor int NOT NULL,
    Mensaje varchar(300) NOT NULL,
    Fecha date NOT NULL,
    constraint PK_Notificaciones primary key(idNotificaciones),
--     constraint fk_NotificacionesCentro foreign key(Autor) references CentroDonacion(idCentroDonacion)
    constraint fk_NotificacionesCentro foreign key(Autor) references Persona(idPersona)
);

create table Mensaje(
    idMensaje int NOT NULL AUTO_INCREMENT,
    Nombre varchar(45) NOT NULL,
    Correo varchar(45) NOT NULL,
    Telefono varchar(10) NOT NULL,
    Mensaje text NOT NULL,
    constraint PK_Mensaje primary key(idMensaje)
);

create table Pregunta(
    idPregunta int NOT NULL AUTO_INCREMENT,
    Pregunta text NOT NULL,
    Respuesta text NOT NULL,
    constraint PK_Pregunta primary key(idPregunta)
);
-- INSERT INTO Notificaciones ( Autor, Mensaje, Fecha) VALUES (1,"se necesita sangre ab-","2017-12-29");
-- SELECT * FROM Notificaciones INNER JOIN Persona P ON Notificaciones.Autor = P.idPersona ;
-- UPDATE Pregunta SET Pregunta,Respuesta WHERE idPregunta
-- INSERT INTO Pregunta (idPregunta, Pregunta, Respuesta) VALUES ();
-- INSERT INTO Pregunta ( Pregunta, Respuesta) VALUES ("para que son las preguntas?","creo que no sirven pero igual");
-- SELECT * FROM Eventos INNER JOIN CentroDonacion ON Eventos.Autor = CentroDonacion.idCentroDonacion
--  INSERT INTO Eventos (Titulo, Autor, Mensaje, Fecha) VALUE ("Comparte algo de ti",7,"vel el dia 23 a donar sangres y comparte a los que necesitan","2017-12-28");
-- insert into Mensaje (Nombre ,Correo , Telefono , Mensaje) values ("edson lipa","edson@gmail.com","943771077","quisiera ser parte de la apliccion");
