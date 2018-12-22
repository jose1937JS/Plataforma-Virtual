-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-12-2018 a las 18:44:40
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materias`
--

CREATE TABLE `Materias` (
  `id_materia` int(11) NOT NULL,
  `materia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(128) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Materias`
--

INSERT INTO `Materias` (`id_materia`, `materia`, `descripcion`, `imagen`) VALUES
(1, 'Matematica', 'Ciencia formal que, partiendo de axiomas y siguiendo el razonamiento lógico, estudia las propiedades y relaciones entre entidades abstractas como números, figuras geométricas o símbolos.', 'matematica.jpg'),
(2, 'Biologia', 'ciencia que estudia a los seres vivos, su origen, evolución y sus propiedades: nutrición, morfogénesis, reproducción, patogenia, etc', 'biologia.jpg'),
(3, 'Ingles', 'Es una lengua germánica occidental que surgió en los reinos anglosajones de Inglaterra y se extendió hasta el Norte en lo que se convertiría en el sudeste de Escocia, bajo la influencia del Reino de Northumbria.', 'ingles.jpg'),
(4, 'Quimica', 'Ciencia que estudia tanto la composición, como la estructura y las propiedades de la materia como los cambios que esta experimenta durante las reacciones químicas y su relación con la energía.​', 'quimica.png'),
(5, 'Fisica', 'al q tiene q ver con las interecciones del los objrods', 'fisica.jpeg'),
(6, 'Ciencias Sociales', 'Está vinculada a las actividades y el comportamiento de los seres humanos, por lo tanto, analizan las manifestaciones de la sociedad, tanto materiales como simbólicas.', 'sociales.jpg'),
(7, 'Geografia', 'Es la ciencia que se encarga de la descripción de la Tierra, por lo tanto, estudia el medio ecológico, las sociedades que habitan en él y las regiones que se forman al producirse esta relación.', 'geografia.jpg'),
(8, 'Orientacion y Convivencia', 'Consiste en brindarle ayuda al estudiante para que logre identificar y superar dificultades que afecten su rendimiento académico.', 'convivencia.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Notas`
--

CREATE TABLE `Notas` (
  `id_notas` int(11) NOT NULL,
  `materia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `evaluacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `alumno` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nota` varchar(4) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PersonaSecciones`
--

CREATE TABLE `PersonaSecciones` (
  `id_persecc` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Secciones`
--

CREATE TABLE `Secciones` (
  `id_seccion` int(11) NOT NULL,
  `seccion` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `Materias`
--
ALTER TABLE `Materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `Notas`
--
ALTER TABLE `Notas`
  ADD PRIMARY KEY (`id_notas`);

--
-- Indices de la tabla `Personas`
--
ALTER TABLE `Personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `PersonaSecciones`
--
ALTER TABLE `PersonaSecciones`
  ADD PRIMARY KEY (`id_persecc`),
  ADD KEY `persona_id` (`persona_id`),
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
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `persona_id` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Materias`
--
ALTER TABLE `Materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `Notas`
--
ALTER TABLE `Notas`
  MODIFY `id_notas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Personas`
--
ALTER TABLE `Personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PersonaSecciones`
--
ALTER TABLE `PersonaSecciones`
  MODIFY `id_persecc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PubicacionComentarios`
--
ALTER TABLE `PubicacionComentarios`
  MODIFY `id_pubcomen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Publicaciones`
--
ALTER TABLE `Publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Secciones`
--
ALTER TABLE `Secciones`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD CONSTRAINT `Comentarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`);

--
-- Filtros para la tabla `PersonaSecciones`
--
ALTER TABLE `PersonaSecciones`
  ADD CONSTRAINT `PersonaSecciones_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`),
  ADD CONSTRAINT `PersonaSecciones_ibfk_2` FOREIGN KEY (`seccion_id`) REFERENCES `Secciones` (`id_seccion`);

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
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
