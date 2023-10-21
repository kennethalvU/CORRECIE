-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2023 a las 17:13:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `correcie`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERT_INFO_DOC` (IN `id_departamento` INT, IN `tipoDoc` VARCHAR(255), IN `descripcion` TEXT, IN `fecha` DATETIME, IN `destino` VARCHAR(255), IN `folder` VARCHAR(255), IN `caja` VARCHAR(255), IN `observaciones` TEXT, IN `ruta` VARCHAR(512))   BEGIN
    DECLARE v_id_documento INT;

    -- Handlers for potential errors during execution
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    -- Start a transaction
    START TRANSACTION;
    
    INSERT INTO documentos(ruta_doc, tipo_doc, descripcion_doc, fecha, folder, caja, destino)
    VALUES(ruta, tipoDoc, descripcion, fecha, folder, caja, destino);
    
    SET v_id_documento = LAST_INSERT_ID();
    
    INSERT INTO acceso_documentos(id_documento, id_departamento)
    VALUES(v_id_documento, id_departamento);
    
    COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso_documentos`
--

CREATE TABLE `acceso_documentos` (
  `id_documento` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acceso_documentos`
--

INSERT INTO `acceso_documentos` (`id_documento`, `id_departamento`) VALUES
(0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre`, `descripcion`) VALUES
(1, 'Personal', 'Departamento de contratacion de personal'),
(2, 'Informatica', 'Departamento de informatica'),
(3, 'Juridico', 'Departamento de juridico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(11) NOT NULL,
  `ruta_doc` varchar(512) NOT NULL,
  `tipo_doc` varchar(255) DEFAULT NULL,
  `descripcion_doc` text DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_insert` datetime DEFAULT current_timestamp(),
  `folder` varchar(255) DEFAULT NULL,
  `caja` varchar(255) DEFAULT NULL,
  `no_folio` varchar(255) DEFAULT NULL,
  `usuario_subido_por` int(11) DEFAULT NULL,
  `destino` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_documento`, `ruta_doc`, `tipo_doc`, `descripcion_doc`, `fecha`, `fecha_insert`, `folder`, `caja`, `no_folio`, `usuario_subido_por`, `destino`) VALUES
(0, 'public\\documents\\POF-OP-02-SFSA-Isls-2018', 'P/OF-OP-02-SFSA-Isls-2018', 'Solicitando que sean evaluados los señores Gutierrez Pérez y Guzmán Velásquez, para optar a las plazas vacantes del Segundo Batallón de Ingenieros de Construcción de este Comando.', '2018-01-03 01:27:20', '2023-10-21 01:24:48', '1', '5', '6', NULL, '2BIC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(2, 'Administrador', 'Rol administrador'),
(3, 'General', 'Rol general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre`, `contraseña`, `id_rol`, `id_departamento`) VALUES
(2, 'kennethalv', 'Kenneth Bolvito', '123', 2, 1),
(0, 'juanlop', 'Juan Lopez', '123', 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso_documentos`
--
ALTER TABLE `acceso_documentos`
  ADD PRIMARY KEY (`id_documento`,`id_departamento`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `usuario_subido_por` (`usuario_subido_por`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
