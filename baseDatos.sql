-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-12-2017 a las 01:44:03
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u582792294_dsaqp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CentroDonacion`
--

CREATE TABLE `CentroDonacion` (
  `idCentroDonacion` int(11) NOT NULL,
  `nombreCentro` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Latitud` float NOT NULL,
  `Longitud` float NOT NULL,
  `Representante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CentroDonacion`
--

INSERT INTO `CentroDonacion` (`idCentroDonacion`, `nombreCentro`, `Direccion`, `Latitud`, `Longitud`, `Representante`) VALUES
(2, 'Hospital Nacional Carlos Alberto Seguin Escobedo EsSalud', ' Esquina de Peral y Filtro S/N, Arequipa', -16.3941, -71.5292, 1),
(3, 'Hospital Regional III Honorio Delgado', 'Av. Daniel Alcides Carreon 505  Arequipa - Perú', -16.4158, -71.5323, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Eventos`
--

CREATE TABLE `Eventos` (
  `idEventos` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Autor` int(11) NOT NULL,
  `Mensaje` varchar(500) NOT NULL,
  `Fecha` date NOT NULL,
  `TipoSangre` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Eventos`
--

INSERT INTO `Eventos` (`idEventos`, `Titulo`, `Autor`, `Mensaje`, `Fecha`, `TipoSangre`) VALUES
(1, 'Donacion O+', 2, 'Donacion urgente para mi companero Enrique ', '2017-12-27', 'A+'),
(2, 'Donacion AB', 2, 'Donacion urgente para mi amigo Eduardo', '2017-12-30', 'B-'),
(3, 'Se necesita donantes urgente', 2, 'Familia accidentada, entre ellos 2 adolescentes y un bebe', '2017-12-27', 'AB+'),
(4, 'Se necesita donacion urgente', 2, 'Se necesita donacion urgente', '2017-12-28', 'B+'),
(5, 'Victor Alvarez - Donacion B+', 3, 'Se necesita con urgencia donantes , servicio de UCI', '2017-12-27', 'B+'),
(6, 'Campaña de Donacion de Sangre', 3, 'Hasta cuatro vidas podrian ser salvadas con la donacion de una unidad de sangre este 5 de Enero acercate al Hospital Honorio Delgado y ayuda una buena causa', '2017-12-27', 'Cam'),
(7, 'Campaña de Donacion', 3, 'Hasta cuatro podrian ser salvadas con la donacion de una unidad de sangre, Este 2 de Enero acercate al Hospital Honorio Delgado Espinosa, la campaña empieza desde las 7 horas', '2017-12-27', 'Cam');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mensaje`
--

CREATE TABLE `Mensaje` (
  `idMensaje` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Mensaje` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Mensaje`
--

INSERT INTO `Mensaje` (`idMensaje`, `Nombre`, `Correo`, `Telefono`, `Mensaje`) VALUES
(2, 'Luis', 'luis@gmail.com', '2323222', 'Muy buena idea, sigan adelante y a mejorar el proyecto.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE `Persona` (
  `idPersona` int(11) NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `TipoSangre` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Edad` int(11) NOT NULL,
  `Genero` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Permisos` int(11) NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`idPersona`, `Nombres`, `Apellidos`, `TipoSangre`, `Edad`, `Genero`, `Correo`, `Permisos`, `Password`) VALUES
(1, 'Luis', 'Murillo', 'A-', 20, 'Masculino', 'luis@gmail.com', 2, '502ff82f7f1f8218dd41201fe4353687'),
(5, 'Luis', 'Villanueva', 'O+', 17, 'Masculino', 'furiadorada35@gmail.com', 1, '6d31cfcbe24f792b82271eee4d7d8e0e'),
(7, 'Milagros', 'Cruz', 'B+', 20, 'Femenino', 'milagros.111@gmail.com', 1, 'c5fe25896e49ddfe996db7508cf00534'),
(8, 'Melvin', 'Salcedo', 'A-', 22, 'masculino', 'melvin@gmail.com', 1, 'dabd018f98476c1f6eb2f23e8d9b8920'),
(10, 'Eduardo', 'Sanchez', 'O-', 18, 'Masculino', 'ants252699@gmail.com', 1, 'd8a2b206a3d50e05eafe9adf7af8cea4'),
(11, 'Enrique', 'Gutierrez Salazar', 'O-', 30, 'masculino', 'quiquealonwow@gmail.com', 2, '25f9e794323b453885f5181f1b624d0b'),
(12, 'Juan', 'Castillo', 'A+', 34, 'masculino', 'juancastillo@gmail.com', 2, '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 'Edson', 'Lipa', 'A+', 20, 'Masculino', 'edson@gmail.com', 1, '6187af1c446bf61143ad165cabc14817'),
(14, 'Gaby', 'Rojas', 'O-', 18, 'Femenino', 'gaby.rojas@gmail.com', 2, 'b0baee9d279d34fa1dfd71aadb908c3f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pregunta`
--

CREATE TABLE `Pregunta` (
  `idPregunta` int(11) NOT NULL,
  `Titulo` text COLLATE utf8_unicode_ci NOT NULL,
  `Respuesta` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Pregunta`
--

INSERT INTO `Pregunta` (`idPregunta`, `Titulo`, `Respuesta`) VALUES
(1, 'EL CONSUMO DE TABACO U ALCOHOL, ¿COMO INTERFIERE EN LA DONACION?', 'En el caso del tabaco, antes de la donación no influye. Después de ésta, se recomienda esperar al menos dos horas para evitar mareos.El consumo de alcohol antes de la donación sí puede contraindicar la misma, dependiendo de cuándo y cuánto se haya consumido. Después de donar, hay que esperar dos horas antes de ingerir bebidas alcoholicas.'),
(2, '¿ES NECESARIO ESTAR EN AYUNAS?', 'Por el contrario, es importante que antes de la donación se desayune normalmente, de igual modo que es conveniente almorzar o cenar en forma habitual, dependiendo del horario en que se realice la donación de sangre. En los países desarrollados la gente dona en cualquier momento, durante las 24 horas del día.'),
(3, '¿INFLUYE EL INDICE DE AZUCAR EN LA POSIBILIDAD DE DONAR SANGRE?', 'Sí, solo si se es diabético con tratamiento de insulina, no se puede donar sangre, ya que la donación puede afectar al donante. En el caso de diabéticos tratados con dieta o antidiabéticos orales (pastillas) si pueden donar sangre.'),
(4, 'SI UNA MUJER ESTA EMBARAZADA, ¿PUEDE DONAR?', 'No, durante el embarazo y luego debe esperar seis meses desde el parto, o desde la finalización de la lactancia en caso de haberla.\r\nEn caso de aborto solo hay que mantener una cuarentena igual al periodo de gestación , es decir, si el aborto fue en el primer mes de gestación la cuarentena tiene que ser de un mes.'),
(5, '¿PUEDO DONAR SI TUVE HEPATITIS?', 'Sí, en el caso de la Hepatitis A. Nunca en el de la hepatitis B ni en la C.'),
(6, '¿CADA CUÁNTO PUEDO DONAR SANGRE?', 'Se puede donar sangre con un intervalo mínimo de 2 meses. Los hombres pueden donar hasta 4 veces en un año natural, y las mujeres 3. Esta diferencia no es discriminación, sino para compensar las pérdidas que tienen las mujeres por la regla.'),
(7, '¿SE PUEDE CONTAGIAR UNA PERSONA DE SIDA AL DONAR SANGRE?', 'Los donantes no contraerán SIDA, ni ninguna otra infección por el hecho de dar sangre. Todo el material utilizado en la recolección es estéril y descartable.'),
(8, '¿QUE SE HACE CON LA SANGRE DONADA?', 'La sangre no se transfunde tal y como se obtiene del donante, sino que se utilizan sus distintos componentes por separado en función del tipo de enfermo al que vaya destinado. En primer lugar se determina el grupo ABO y el Rh, para después proceder a realizar una serie de análisis sistemáticos y rigurosos que garanticen la calidad del producto. Una vez analizada se fracciona, obteniendo los diferentes componentes. Estos se utilizan para el tratamiento de distintas enfermedades, como la anemia, leucemia, hemofilia falta de defensas… también se usa en el tratamiento de enfermos de cáncer, ante hemorragias, en la elaboración de medicamentos y otros actos médicos como trasplantes e intervenciones quirúrgicas. Diariamente los, hospitales solicitan a los bancos de sangre las cantidades de los diferentes componentes sanguíneos de acuerdo con las necesidades existentes. Estos deben reservar unas cantidades que cubran posibles urgencias.'),
(9, '¿CUÁNTO TIEMPO TARDA LA EXTRACCIÓN DE SANGRE?', 'No mucho. El tiempo necesario para rellenar el formulario de autoexclusión, realizar la entrevista médica, completar el proceso de extracción y dedicar unos minutos a recuperarse. En total, dedicaremos aproximadamente entre 20-30 minutos.'),
(10, '¿PUEDO REALIZAR EJERCICIO DESPUÉS DE DONAR?', 'En las horas siguientes a una donación de sangre debe evitarse, dado que puede ocasionar mareos.'),
(11, '¿CUÁNTA SANGRE ME VAN A EXTRAER?', 'Legalmente se puede extraer hasta un 13% del volumen total de la sangre de una persona. No obstante, por la estandarización de las bolsas de sangre utilizadas habitualmente, se extraen 450 cc. , que supone la cantidad máxima que es posible extraer a una persona de 50 Kg. de peso sin causarle ningún perjuicio.'),
(12, '¿PUEDE DONARSE SANGRE TENIENDO TATUAJES?', 'Sí, siempre y cuando hayan transcurrido 4 meses.  En el caso de los piercings, también es necesario dejar transcurrir 4 meses.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CentroDonacion`
--
ALTER TABLE `CentroDonacion`
  ADD PRIMARY KEY (`idCentroDonacion`),
  ADD KEY `Representante` (`Representante`);

--
-- Indices de la tabla `Eventos`
--
ALTER TABLE `Eventos`
  ADD PRIMARY KEY (`idEventos`),
  ADD KEY `fk_EventosCentro` (`Autor`);

--
-- Indices de la tabla `Mensaje`
--
ALTER TABLE `Mensaje`
  ADD PRIMARY KEY (`idMensaje`);

--
-- Indices de la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  ADD PRIMARY KEY (`idPregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CentroDonacion`
--
ALTER TABLE `CentroDonacion`
  MODIFY `idCentroDonacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Eventos`
--
ALTER TABLE `Eventos`
  MODIFY `idEventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Mensaje`
--
ALTER TABLE `Mensaje`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Persona`
--
ALTER TABLE `Persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CentroDonacion`
--
ALTER TABLE `CentroDonacion`
  ADD CONSTRAINT `CentroDonacion_ibfk_1` FOREIGN KEY (`Representante`) REFERENCES `Persona` (`idPersona`);

--
-- Filtros para la tabla `Eventos`
--
ALTER TABLE `Eventos`
  ADD CONSTRAINT `fk_EventosCentro` FOREIGN KEY (`Autor`) REFERENCES `CentroDonacion` (`idCentroDonacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
