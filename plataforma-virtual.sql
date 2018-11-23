-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2010 at 07:36 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 7.1.14-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plataforma-virtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comentarios`
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
-- Table structure for table `Evaluaciones`
--

CREATE TABLE `Evaluaciones` (
  `id_evaluacion` int(11) NOT NULL,
  `fecha_final` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nota` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `evaluacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tema_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Materias`
--

CREATE TABLE `Materias` (
  `id_materia` int(11) NOT NULL,
  `materia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `seccion` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PersonaMaterias`
--

CREATE TABLE `PersonaMaterias` (
  `id_personamateria` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Personas`
--

CREATE TABLE `Personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Publicaciones`
--

CREATE TABLE `Publicaciones` (
  `id_publicacion` int(11) NOT NULL,
  `publicacion` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `persona_id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Temas`
--

CREATE TABLE `Temas` (
  `id_tema` int(11) NOT NULL,
  `tema` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indexes for table `Evaluaciones`
--
ALTER TABLE `Evaluaciones`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `tema_id` (`tema_id`);

--
-- Indexes for table `Materias`
--
ALTER TABLE `Materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `PersonaMaterias`
--
ALTER TABLE `PersonaMaterias`
  ADD PRIMARY KEY (`id_personamateria`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indexes for table `Personas`
--
ALTER TABLE `Personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `Publicaciones`
--
ALTER TABLE `Publicaciones`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `comentario_id` (`comentario_id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indexes for table `Temas`
--
ALTER TABLE `Temas`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Evaluaciones`
--
ALTER TABLE `Evaluaciones`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Materias`
--
ALTER TABLE `Materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PersonaMaterias`
--
ALTER TABLE `PersonaMaterias`
  MODIFY `id_personamateria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Personas`
--
ALTER TABLE `Personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Publicaciones`
--
ALTER TABLE `Publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Temas`
--
ALTER TABLE `Temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Evaluaciones`
--
ALTER TABLE `Evaluaciones`
  ADD CONSTRAINT `Evaluaciones_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`),
  ADD CONSTRAINT `Evaluaciones_ibfk_2` FOREIGN KEY (`tema_id`) REFERENCES `Temas` (`id_tema`);

--
-- Constraints for table `PersonaMaterias`
--
ALTER TABLE `PersonaMaterias`
  ADD CONSTRAINT `PersonaMaterias_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `Materias` (`id_materia`),
  ADD CONSTRAINT `PersonaMaterias_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`);

--
-- Constraints for table `Publicaciones`
--
ALTER TABLE `Publicaciones`
  ADD CONSTRAINT `Publicaciones_ibfk_1` FOREIGN KEY (`comentario_id`) REFERENCES `Comentarios` (`id_comentario`),
  ADD CONSTRAINT `Publicaciones_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
