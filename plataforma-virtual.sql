-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2018 a las 22:33:07
-- Versión del servidor: 5.5.58-0ubuntu0.14.04.1
-- Versión de PHP: 7.1.14-1+ubuntu14.04.1+deb.sury.org+1

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
(1, 'holaaa mama mirame etoy comentando una publiacion', NULL, '15-07-2018 17:44:11', 1);

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
(2, 'Cesar', 'Pdrino', 'cesarpa@gmail.com', NULL, NULL);

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
(8, 'hoal q ltaocoaldas adasd i loveuforoo', NULL, '04-12-2018 22:31:11', 1, 1);

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
(2, 'cesar', 'cesar', 'alumno', 2);

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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id_pubcomen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Publicaciones`
--
ALTER TABLE `Publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
