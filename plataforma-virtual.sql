-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2018 a las 00:31:13
-- Versión del servidor: 5.5.58-0ubuntu0.14.04.1
-- Versión de PHP: 7.2.13-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataforma-virtual`
--
CREATE DATABASE IF NOT EXISTS `plataforma-virtual` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `plataforma-virtual`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comentarios`
--

CREATE TABLE `Comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Comentarios`
--

INSERT INTO `Comentarios` (`id_comentario`, `comentario`, `archivo`, `fecha`, `persona_id`) VALUES
(1, 'holaaa mama mirame etoy comentando una publiacion', NULL, '15-07-2018 17:44:11', 1),
(2, 'hola q tal', '', '06-12-2018 21:30:57', 1),
(3, '', '', '06-12-2018 21:44:48', 1),
(4, '', '', '06-12-2018 21:53:38', 1),
(5, '', '', '06-12-2018 21:54:24', 1),
(6, '', '', '06-12-2018 21:57:37', 1),
(8, 'hola q tla esta fito ?', '', '06-12-2018 22:42:01', 1),
(9, '', '', '06-12-2018 22:43:23', 1),
(10, 'angular &lt;3', 'favicon.ico', '06-12-2018 22:44:06', 1),
(11, 'hola wapa', '', '07-12-2018 19:09:42', 1),
(13, 'comentario', '', '07-12-2018 21:48:40', 1),
(17, '', 'A1.jpg', '07-12-2018 22:13:12', 2),
(19, 'q tal yo tambine', '', '08-12-2018 15:35:26', 1),
(20, 'comentario de cesaranotnasd', '', '08-12-2018 15:45:55', 2),
(21, 'asdasdasda', '', '09-12-2018 22:16:02', 2),
(22, 'asdasdasda', '', '09-12-2018 22:17:59', 2),
(23, 'asdasdasda', '', '09-12-2018 22:18:14', 2),
(24, 'asdasdasda', '', '09-12-2018 22:18:26', 2),
(25, 'wenas', '', '09-12-2018 22:21:11', 2),
(26, 'asdasdasdasadasdadadasd', '', '09-12-2018 22:45:16', 1),
(27, 'brasilera', '', '09-12-2018 22:44:55', 1),
(29, '', 'user.png', '09-12-2018 22:45:32', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Evaluaciones`
--

CREATE TABLE `Evaluaciones` (
  `id_evaluacion` int(11) NOT NULL,
  `fecha_final` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tema_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materias`
--

CREATE TABLE `Materias` (
  `id_materia` int(11) NOT NULL,
  `materia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Materias`
--

INSERT INTO `Materias` (`id_materia`, `materia`, `descripcion`) VALUES
(1, 'Matematica', 'Ciencia formal que, partiendo de axiomas y siguiendo el razonamiento lógico, estudia las propiedades y relaciones entre entidades abstractas como números, figuras geométricas o símbolos.'),
(2, 'Biologia', 'ciencia que estudia a los seres vivos, su origen, evolución y sus propiedades: nutrición, morfogénesis, reproducción, patogenia, etc'),
(3, 'Ingles', 'Es una lengua germánica occidental que surgió en los reinos anglosajones de Inglaterra y se extendió hasta el Norte en lo que se convertiría en el sudeste de Escocia, bajo la influencia del Reino de Northumbria.'),
(4, 'Quimica', 'Ciencia que estudia tanto la composición, como la estructura y las propiedades de la materia como los cambios que esta experimenta durante las reacciones químicas y su relación con la energía.​'),
(5, 'Fisica', 'al q tiene q ver con las interecciones del los objrods');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PersonaMaterias`
--

CREATE TABLE `PersonaMaterias` (
  `id_personamateria` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PersonaMaterias`
--

INSERT INTO `PersonaMaterias` (`id_personamateria`, `persona_id`, `materia_id`) VALUES
(1, 1, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Personas`
--

CREATE TABLE `Personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_perfil` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Personas`
--

INSERT INTO `Personas` (`id_persona`, `nombre`, `apellido`, `correo`, `telefono`, `foto_perfil`) VALUES
(1, 'Jose Fernando', 'Lopez Ortiz', 'jose@lopez.com', '05151111112', ''),
(2, 'Cesar', 'Pdrino', 'cesarpa@gmail.com', NULL, NULL),
(3, 'admi', 'nistrador', 'admin@admin.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PersonaSecciones`
--

CREATE TABLE `PersonaSecciones` (
  `id_persecc` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PersonaSecciones`
--

INSERT INTO `PersonaSecciones` (`id_persecc`, `persona_id`, `seccion_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesores`
--

CREATE TABLE `Profesores` (
  `id_profesor` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_academico` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `seccion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PubicacionComentarios`
--

CREATE TABLE `PubicacionComentarios` (
  `id_pubcomen` int(11) NOT NULL,
  `publicacion_id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PubicacionComentarios`
--

INSERT INTO `PubicacionComentarios` (`id_pubcomen`, `publicacion_id`, `comentario_id`) VALUES
(1, 7, 1),
(2, 7, 2),
(3, 7, 3),
(4, 7, 4),
(5, 7, 5),
(6, 7, 6),
(8, 7, 8),
(9, 7, 9),
(10, 7, 10),
(19, 10, 19),
(20, 10, 20),
(22, 14, 26),
(23, 14, 27),
(25, 14, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Publicaciones`
--

CREATE TABLE `Publicaciones` (
  `id_publicacion` int(11) NOT NULL,
  `publicacion` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Publicaciones`
--

INSERT INTO `Publicaciones` (`id_publicacion`, `publicacion`, `archivo`, `fecha`, `seccion_id`, `persona_id`) VALUES
(7, 'hola q jhace', NULL, '14-12-1002 12:22:44', 1, 2),
(9, 'hola a todos buenos tardes', NULL, '08-12-2018 13:40:40', 1, 2),
(10, 'hola soy jose', NULL, '08-12-2018 15:30:14', 1, 1),
(13, 'hola', '‪29258064_441168779636837_3495804869460192267_n_png.jpg', '09-12-2018 22:26:26', 1, 1),
(14, 'dios mio', 'o1.jpg', '09-12-2018 22:34:47', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Secciones`
--

CREATE TABLE `Secciones` (
  `id_seccion` int(11) NOT NULL,
  `seccion` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Secciones`
--

INSERT INTO `Secciones` (`id_seccion`, `seccion`, `materia_id`) VALUES
(1, 'A', 2),
(2, 'C', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Temas`
--

CREATE TABLE `Temas` (
  `id_tema` int(11) NOT NULL,
  `tema` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id_usuario`, `usuario`, `clave`, `tipo`, `persona_id`) VALUES
(1, 'jose', 'jose', 'profesor', 1),
(2, 'cesar', 'cesar', 'alumno', 2),
(3, 'admin', 'admin', 'admin', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `Evaluaciones`
--
ALTER TABLE `Evaluaciones`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `tema_id` (`tema_id`);

--
-- Indices de la tabla `Materias`
--
ALTER TABLE `Materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `PersonaMaterias`
--
ALTER TABLE `PersonaMaterias`
  ADD PRIMARY KEY (`id_personamateria`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `Personas`
--
ALTER TABLE `Personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `PersonaSecciones`
--
ALTER TABLE `PersonaSecciones`
  ADD PRIMARY KEY (`id_persecc`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `seccion_id` (`seccion_id`);

--
-- Indices de la tabla `Profesores`
--
ALTER TABLE `Profesores`
  ADD PRIMARY KEY (`id_profesor`),
  ADD KEY `seccion_id` (`seccion_id`);

--
-- Indices de la tabla `PubicacionComentarios`
--
ALTER TABLE `PubicacionComentarios`
  ADD PRIMARY KEY (`id_pubcomen`),
  ADD KEY `comentario_id` (`comentario_id`),
  ADD KEY `publicacion_id` (`publicacion_id`);

--
-- Indices de la tabla `Publicaciones`
--
ALTER TABLE `Publicaciones`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `seccion_id` (`seccion_id`);

--
-- Indices de la tabla `Secciones`
--
ALTER TABLE `Secciones`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indices de la tabla `Temas`
--
ALTER TABLE `Temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `persona_id` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `Evaluaciones`
--
ALTER TABLE `Evaluaciones`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Materias`
--
ALTER TABLE `Materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `PersonaMaterias`
--
ALTER TABLE `PersonaMaterias`
  MODIFY `id_personamateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Personas`
--
ALTER TABLE `Personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `PersonaSecciones`
--
ALTER TABLE `PersonaSecciones`
  MODIFY `id_persecc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Profesores`
--
ALTER TABLE `Profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PubicacionComentarios`
--
ALTER TABLE `PubicacionComentarios`
  MODIFY `id_pubcomen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `Publicaciones`
--
ALTER TABLE `Publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `Secciones`
--
ALTER TABLE `Secciones`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Temas`
--
ALTER TABLE `Temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD CONSTRAINT `Comentarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`);

--
-- Filtros para la tabla `Evaluaciones`
--
ALTER TABLE `Evaluaciones`
  ADD CONSTRAINT `Evaluaciones_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`),
  ADD CONSTRAINT `Evaluaciones_ibfk_2` FOREIGN KEY (`tema_id`) REFERENCES `Temas` (`id_tema`);

--
-- Filtros para la tabla `PersonaMaterias`
--
ALTER TABLE `PersonaMaterias`
  ADD CONSTRAINT `PersonaMaterias_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `Materias` (`id_materia`),
  ADD CONSTRAINT `PersonaMaterias_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`);

--
-- Filtros para la tabla `PersonaSecciones`
--
ALTER TABLE `PersonaSecciones`
  ADD CONSTRAINT `PersonaSecciones_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`),
  ADD CONSTRAINT `PersonaSecciones_ibfk_2` FOREIGN KEY (`seccion_id`) REFERENCES `Secciones` (`id_seccion`);

--
-- Filtros para la tabla `Profesores`
--
ALTER TABLE `Profesores`
  ADD CONSTRAINT `Profesores_ibfk_1` FOREIGN KEY (`seccion_id`) REFERENCES `Secciones` (`id_seccion`);

--
-- Filtros para la tabla `PubicacionComentarios`
--
ALTER TABLE `PubicacionComentarios`
  ADD CONSTRAINT `PubicacionComentarios_ibfk_1` FOREIGN KEY (`comentario_id`) REFERENCES `Comentarios` (`id_comentario`),
  ADD CONSTRAINT `PubicacionComentarios_ibfk_2` FOREIGN KEY (`publicacion_id`) REFERENCES `Publicaciones` (`id_publicacion`);

--
-- Filtros para la tabla `Publicaciones`
--
ALTER TABLE `Publicaciones`
  ADD CONSTRAINT `Publicaciones_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`),
  ADD CONSTRAINT `Publicaciones_ibfk_3` FOREIGN KEY (`seccion_id`) REFERENCES `Secciones` (`id_seccion`);

--
-- Filtros para la tabla `Secciones`
--
ALTER TABLE `Secciones`
  ADD CONSTRAINT `Secciones_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `Materias` (`id_materia`);

--
-- Filtros para la tabla `Temas`
--
ALTER TABLE `Temas`
  ADD CONSTRAINT `Temas_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `Materias` (`id_materia`);

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
