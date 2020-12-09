-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2020 a las 00:09:59
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `likor`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Cliente` (`valor` INT(10))  SELECT *
FROM cliente
WHERE cliente.Telefono= valor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProducto` (IN `_Tipo_Producto` VARCHAR(50), IN `_Nombre` VARCHAR(50), IN `_Precio` INT(7), IN `_Volumen` VARCHAR(100), IN `_Id_Gerente` INT(10), IN `_Id_Pedido` INT(3))  BEGIN
       INSERT INTO producto (FK_Id_Gerente, FK_Id_Pedido, Nombre, Precio, Tipo_Producto, Volumen) VALUES (_Id_Gerente, _Id_Pedido, _Nombre, _Precio, _Tipo_Producto, _Volumen);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PedidoID` (IN `ID` INT(3))  SELECT *
FROM pedido
WHERE pedido.Id_Pedido= ID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `barriocliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `barriocliente` (
`Id_Cliente` int(11)
,`Nombre` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_Cliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Barrio` varchar(50) NOT NULL,
  `Telefono1` varchar(10) NOT NULL,
  `Telefono2` int(10) NOT NULL,
  `Direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `Nombre`, `Barrio`, `Telefono1`, `Telefono2`, `Direccion`) VALUES
(2422, 'Hola soy yo ', 'Usme', '35424435', 2424335, '#34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cp`
--

CREATE TABLE `detalle_cp` (
  `Id_DetalleCP` int(11) NOT NULL,
  `FK_Id_Cliente` int(11) NOT NULL,
  `FK_Id_Pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ec`
--

CREATE TABLE `detalle_ec` (
  `Id_DetalleEC` int(11) NOT NULL,
  `FK_Id_Empleado` int(11) NOT NULL,
  `FK_Id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `Id_Devolucion` int(11) NOT NULL,
  `Asunto` varchar(100) NOT NULL,
  `Barrio` varchar(50) NOT NULL,
  `FK_Id_Pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`Id_Devolucion`, `Asunto`, `Barrio`, `FK_Id_Pedido`) VALUES
(2442, 'sdsdd', 'Columnas', 55354334),
(334424, 'no era la direccion', 'Lomas', 55354334);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliario`
--

CREATE TABLE `domiciliario` (
  `id_domiciliario` int(11) NOT NULL,
  `Identificacion` int(10) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Correo_electronico` varchar(50) NOT NULL,
  `FK_Id_Supervisor` int(11) NOT NULL,
  `FK_id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domiciliario`
--

INSERT INTO `domiciliario` (`id_domiciliario`, `Identificacion`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electronico`, `FK_Id_Supervisor`, `FK_id_roles`) VALUES
(4, 13224, 'German', 'Velasco', 453267, 'carrera 6 ', '244@gmail.com', 0, 0),
(5, 3456890, 'Carlos', 'Moreno', 543216, 'Carrear 4 ', 'carlos@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `Identificacion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Correo_electronico` varchar(50) NOT NULL,
  `Fecha_de_nacimiento` date NOT NULL,
  `FK_Id_Supervisor` int(11) NOT NULL,
  `FK_id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `Identificacion`, `Nombre`, `Apellido`, `Telefono`, `Correo_electronico`, `Fecha_de_nacimiento`, `FK_Id_Supervisor`, `FK_id_roles`) VALUES
(1, 123456, 'Ricardo', 'Gomez', 454532, 'ricardo@gmail.com', '2020-09-08', 2, 1),
(2, 2424242, 'Alejandro', 'Morales', 54321, 'alejandro@gmail.com', '2020-09-08', 2, 2),
(7, 13224, 'Lucia', 'Franco', 4533432, 'lucia@gmail.com', '2020-09-21', 0, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `empleado_v`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `empleado_v` (
`Id_Empleado` int(11)
,`Nombre` varchar(50)
,`Id_Supervisor` int(11)
,`Apellido` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerente`
--

CREATE TABLE `gerente` (
  `id_gerente` int(11) NOT NULL,
  `Identificacion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Correo_electronico` varchar(50) NOT NULL,
  `FK_id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gerente`
--

INSERT INTO `gerente` (`id_gerente`, `Identificacion`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electronico`, `FK_id_roles`) VALUES
(1, 123456, 'juan', 'gomez', 454532, 'carrera 3', 'juan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `Pedido` mediumtext NOT NULL,
  `Observaciones` longtext NOT NULL,
  `Hora` time(6) NOT NULL,
  `Fecha` date NOT NULL,
  `Tipo_pago` varchar(50) NOT NULL,
  `Total` int(50) NOT NULL,
  `FK_Id_Gerente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Id_Pedido`, `Pedido`, `Observaciones`, `Hora`, `Fecha`, `Tipo_pago`, `Total`, `FK_Id_Gerente`) VALUES
(3534422, 'Cerveza', '2 paquetes ', '17:42:00.000000', '2020-09-08', 'Tarjeta', 50000, 0),
(55354334, 'Hola', 'no se ', '00:00:00.000000', '2020-09-08', '0', 54230, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `preciosuperior`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `preciosuperior` (
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `Tipo_Producto` varchar(50) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(7) NOT NULL,
  `Volumen` varchar(100) NOT NULL,
  `FK_Id_Pedido` int(11) NOT NULL,
  `FK_Id_Gerente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `Tipo_Producto`, `Nombre`, `Precio`, `Volumen`, `FK_Id_Pedido`, `FK_Id_Gerente`) VALUES
(123458, 'Cerveza', 'Aguila', 3000, '250ml', 0, 0),
(123459, 'Cerveza', 'Club Colombia', 3500, '500ml', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Gerente'),
(2, 'Supervisor'),
(3, 'Empleado'),
(4, 'Domiciliario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

CREATE TABLE `supervisor` (
  `id_supervisor` int(11) NOT NULL,
  `Identificacion` int(10) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Telefono` int(10) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Correo_electronico` varchar(50) DEFAULT NULL,
  `FK_Id_Gerente` int(11) NOT NULL,
  `FK_id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `supervisor`
--

INSERT INTO `supervisor` (`id_supervisor`, `Identificacion`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electronico`, `FK_Id_Gerente`, `FK_id_roles`) VALUES
(55, 1234567890, 'Juan', 'Gomez', 43256789, 'Carrear 4 ', 'juan@gmail.com', 0, 0),
(56, 1484566490, 'Cristian', 'Gonzales', 453267, 'carrera 6 ', 'cristian@gmail.com', 0, 0),
(57, 1562345742, 'Brandon', 'Restrepo', 75367, 'Calle 7', 'brandon@gmail.com', 0, 0),
(59, 1006866854, 'Carlos', 'Perez', 2147483647, 'Carrera 4', 'carlos@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `FK_roles_id` int(11) NOT NULL,
  `FK_id_supervisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `FK_roles_id`, `FK_id_supervisor`) VALUES
(1, 'Juan', '12345', 1, 0),
(3, 'jorge', '12345', 3, 3),
(22, 'carlos', '12345', 2, 2),
(38, 'diego', '12345', 4, 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `barriocliente`
--
DROP TABLE IF EXISTS `barriocliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barriocliente`  AS  select `cliente`.`Id_Cliente` AS `Id_Cliente`,`cliente`.`Nombre` AS `Nombre` from `cliente` where `cliente`.`Barrio` = 'Alamos' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `empleado_v`
--
DROP TABLE IF EXISTS `empleado_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empleado_v`  AS  select `empleado`.`id_empleado` AS `Id_Empleado`,`empleado`.`Nombre` AS `Nombre`,`supervisor`.`id_supervisor` AS `Id_Supervisor`,`supervisor`.`Apellido` AS `Apellido` from (`empleado` join `supervisor`) where `empleado`.`FK_Id_Supervisor` = `supervisor`.`id_supervisor` and `empleado`.`Telefono` = 314578221 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `preciosuperior`
--
DROP TABLE IF EXISTS `preciosuperior`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `preciosuperior`  AS  select `producto`.`Id_Producto` AS `Id_Producto`,`producto`.`Nombre` AS `Nombre`,`producto`.`Precio` AS `Precio` from `producto` where `producto`.`Precio` >= 34900 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cliente`);

--
-- Indices de la tabla `detalle_cp`
--
ALTER TABLE `detalle_cp`
  ADD PRIMARY KEY (`Id_DetalleCP`),
  ADD KEY `Id_Pedido_FK` (`FK_Id_Pedido`),
  ADD KEY `Id_Cliente_CPFK` (`FK_Id_Cliente`);

--
-- Indices de la tabla `detalle_ec`
--
ALTER TABLE `detalle_ec`
  ADD PRIMARY KEY (`Id_DetalleEC`),
  ADD KEY `Id_Empleado_FK` (`FK_Id_Empleado`),
  ADD KEY `Id_Cliente_FK` (`FK_Id_Cliente`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`Id_Devolucion`),
  ADD KEY `Id_Pedido_DFK` (`FK_Id_Pedido`);

--
-- Indices de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  ADD PRIMARY KEY (`id_domiciliario`),
  ADD KEY `id_supervisor_FK` (`FK_Id_Supervisor`),
  ADD KEY `FK_rol_id` (`FK_id_roles`) USING BTREE;

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_supervisor_FK` (`FK_Id_Supervisor`),
  ADD KEY `id_roles_FK` (`FK_id_roles`);

--
-- Indices de la tabla `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id_gerente`),
  ADD KEY `FK_id_roles` (`FK_id_roles`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_Pedido`),
  ADD KEY `Id_Gerente_PFK` (`FK_Id_Gerente`) USING BTREE;

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Pedido_PFK` (`FK_Id_Pedido`),
  ADD KEY `Id_Gerente_PFK` (`FK_Id_Gerente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id_supervisor`),
  ADD KEY `id_gerente_FK` (`FK_Id_Gerente`),
  ADD KEY `id_roles_FK` (`FK_id_roles`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supervisor_FK` (`FK_id_supervisor`),
  ADD KEY `FK_id_roles` (`FK_roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_cp`
--
ALTER TABLE `detalle_cp`
  MODIFY `Id_DetalleCP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_ec`
--
ALTER TABLE `detalle_ec`
  MODIFY `Id_DetalleEC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `Id_Devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334425;

--
-- AUTO_INCREMENT de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  MODIFY `id_domiciliario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id_gerente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55354335;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123460;

--
-- AUTO_INCREMENT de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id_supervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_cp`
--
ALTER TABLE `detalle_cp`
  ADD CONSTRAINT `Id_Cliente_CPFK` FOREIGN KEY (`FK_Id_Cliente`) REFERENCES `cliente` (`Id_Cliente`),
  ADD CONSTRAINT `Id_Pedido_FK` FOREIGN KEY (`FK_Id_Pedido`) REFERENCES `pedido` (`Id_Pedido`);

--
-- Filtros para la tabla `detalle_ec`
--
ALTER TABLE `detalle_ec`
  ADD CONSTRAINT `Id_Cliente_FK` FOREIGN KEY (`FK_Id_Cliente`) REFERENCES `cliente` (`Id_Cliente`),
  ADD CONSTRAINT `Id_Empleado_FK` FOREIGN KEY (`FK_Id_Empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `Id_Pedido_DFK` FOREIGN KEY (`FK_Id_Pedido`) REFERENCES `pedido` (`Id_Pedido`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_id_roles` FOREIGN KEY (`FK_roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
