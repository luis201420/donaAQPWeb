create database donarAQP;
use donarAQP;

create table Persona (
	idPersona int NOT NULL AUTO_INCREMENT,
    Nombres varchar(45) NOT NULL,
    Apellidos varchar(45) NOT NULL,
    TipoSangre varchar(2) NOT NULL,
    Edad int NOT NULL,
    Genero varchar(45) NOT NULL,
    Correo varchar(45),
    Permisos int NOT NULL,
    Password text NOT NULL,
    constraint PK_Persona primary key(idPersona)
);


create table CentroDonacion(
	idCentroDonacion int NOT NULL AUTO_INCREMENT,
    nombreCentro varchar(45) NOT NULL,
    Direccion varchar(100) NOT NULL,
    Latitud float NOT NULL,
    Longitud float NOT NULL,
    Representante varchar(8) NOT NULL,
    constraint PK_CentroDonacion primary key(idCentroDonacion),
    constraint FK_CentroPersona foreign key (Representante) references Persona(idPersona)
);


create table Eventos(
	idEventos int NOT NULL AUTO_INCREMENT,
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
    constraint fk_NotificacionesCentro foreign key(Autor) references CentroDonacion(idCentroDonacion)
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