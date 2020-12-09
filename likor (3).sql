-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2020 a las 02:48:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

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
(65329075, 'Ricardo Arias', 'Gaitan ', '3115637854', 3906574, 'Cll 67 sur # 78 - 90'),
(73671256, 'Natalia Acevedo', 'Ricaute', '3187649064', 8045732, 'Cll 45 G sur # 89 - 11'),
(76205639, 'Juliana Angulo', 'Santa Isabel', '3169370956', 421543, 'Kr 7 # 56 - 98'),
(93651730, 'Marcela Donado', 'Quiroga', '316895342', 316895342, 'Cll 14 No 87  65'),
(98543765, 'Sebastian Giraldo ', 'San Jorge', '3187649064', 6342389, 'Cll 14 # 87  - 65'),
(152543895, 'Camilo Murillo', 'Chapinero ', '3178956437', 2147483647, 'Kr 14 # 87 - 65'),
(764390754, 'Sandra Martinez', 'Tunal ', '3127658967', 2147483647, 'Dg 78 D # 89 -09'),
(870673453, 'Karen Quiroga', 'Chico', '3115637854', 8964008, 'Dg 78 D # 89 -09'),
(1022375634, 'Ivan Maldonado', 'Lomas ', '3178965432', 7659054, 'Cll 56 No 32 78'),
(1022654893, 'Gina Londoño', 'Cedritos', '3127658967', 7865428, 'Cll 14 # 87  - 65'),
(1056341893, 'Camilo Castiblanco', 'San Jorge', '3193426534', 2147483647, 'Cll 36 G sur # 11 A 81');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `Id_Devolucion` int(11) NOT NULL,
  `Asunto` varchar(100) NOT NULL,
  `FK_Id_Pedido` int(11) NOT NULL,
  `Id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`Id_Devolucion`, `Asunto`, `FK_Id_Pedido`, `Id_Cliente`) VALUES
(1, 'sdsdd', 55354334, 0),
(2, 'no era la direccion', 55354334, 0),
(3, 'El cliente no contesta los números de telefono', 55354412, 0),
(4, 'La dirección no corresponde', 55354412, 0),
(5, 'La dirección no existe ', 55354412, 0),
(6, 'La dirección no corresponde ', 55354412, 0),
(7, 'El cliente no pudo pagar todos los productos', 55354411, 0),
(8, 'El cliente no contesta ', 55354412, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliario`
--

CREATE TABLE `domiciliario` (
  `id_domiciliario` int(11) NOT NULL,
  `Identificacion` varchar(10) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Correo_electronico` varchar(50) NOT NULL,
  `FK_Id_Supervisor` int(11) NOT NULL,
  `FK_id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domiciliario`
--

INSERT INTO `domiciliario` (`id_domiciliario`, `Identificacion`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electronico`, `FK_Id_Supervisor`, `FK_id_roles`) VALUES
(1, '2147483647', 'Daniel ', 'Sanchez ', '2147483647', 'Cll 67 sur # 78 - 90', 'David12@gmail.com', 0, 0),
(4, '67836473', 'German', 'Velasco', '3108937485', 'Kr 15 No 78 32', 'German@gmail.com', 0, 0),
(5, '3456890', 'Carlos', 'Moreno', '543216', 'Carrear 4 ', 'carlos@gmail.com', 0, 0),
(6, '1089647342', 'Sneider', 'Angarita ', '3145837689', 'Kr 56 # 89 - 09', 'Sneider@gmail.com', 0, 0),
(7, '1023658943', 'Nicolas', 'Barrera', '3117658943', 'Cll 45 G sur # 89 - 11', 'Nicolas@gmail.com', 0, 0),
(8, '1378657376', 'Fernando', 'Jimenez ', '3158749003', 'Kr 14 # 87 - 65', 'Fernando@gmail.com', 0, 0),
(10, '79610665', 'Juan', 'Cardenas', '3228749508', 'Kr 7 # 56 - 98', 'Juan@gmail.com', 0, 0),
(12, '63764892', 'Dilan', 'Villa ', '3126754807', 'Cll 45 G sur # 89 - 11', 'Dilan@gmail.com', 0, 0),
(14, '67845534', 'Jaime ', 'Vargas ', '3180940377', 'Cll 67 sur # 78 - 90', 'Jaime@gmail.com', 0, 0),
(15, '65907543', 'Andres', 'Petano', '3104528945', 'Cll 7 No 67 90 ', 'Andres@gmail.com', 0, 0),
(16, '890546784', 'Esteban ', 'Cordoba ', '3165639074', 'Cll 36 G sur # 11 A 81', 'Esteban@gmail.com', 0, 0),
(18, '12875364', 'Ronald', 'Barrera', '312673475', 'Cll 64 G No11 67', 'alejandrabarbosa2003@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `Identificacion` varchar(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Correo_electronico` varchar(50) NOT NULL,
  `FK_Id_Supervisor` int(11) NOT NULL,
  `FK_id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `Identificacion`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electronico`, `FK_Id_Supervisor`, `FK_id_roles`) VALUES
(1, '89456789', 'Mariana ', 'Gomez ', '3217895474', 'Cll 67 No 78  90', 'GomezDaniel@gmail.com', 0, 0),
(2, '54964709', 'Alejandro', 'Morales', '3186754976', 'Kr 56 No 89 - 09', 'alejandro@gmail.com', 2, 2),
(7, '1322467430', 'Lucia', 'Franco', '3145334326', 'Kr 4 F No 64 43', 'lucia@gmail.com', 0, 0),
(8, '1023658943', 'Katherine ', 'Rojas ', '3198760945', 'Kr 15 No 78 32', 'Katherine@gmail.com', 0, 0),
(9, '6789432189', 'Jeronimo ', 'Acosta', '3178036057', 'Cll 67 No 78 54', 'Jeronimo@gmail.com', 0, 0),
(10, '94598049', 'Andrian', 'Suarez ', '3167547865', 'Kr 15 No 78 32', 'Adrian@gmail.com', 0, 0),
(11, '56784563', 'Lina', 'Mayorca', '3198760945', 'Dg 67 No 67 34 ', 'Lina@gmail.com', 0, 0),
(12, '55308764', 'Laura ', 'Aldana', '3189065432', 'Cll 43A No89 54 ', 'Laura@gmail.com', 0, 0),
(13, '73643098', 'Tatiana ', 'Serrato ', '3189675438', 'Tr 56 No 49 - 65', 'Tatiana@gmail.com', 0, 0),
(14, '98736490', 'Felipe ', 'Gonzales', '3184570293', 'Cll 67 No 78 54', 'Felipe@gmail.com', 0, 0),
(15, '78098367', 'Harvey ', 'Londoño ', '3125675489', 'Kr 4 F No 64 43', 'Harvey@gmail.com', 0, 0),
(16, '900875423', 'Antonio', 'Ortiz', '3127869845', 'Cll 64 G No11 67', 'Antonio@gmail.com', 0, 0),
(18, '78564382', 'Viviana', 'Rojas ', '3124537654', 'Cll 64 G No11 67', 'alejandrabarbosa2003@gmail.com', 0, 0),
(19, '78564382', 'Gina', 'Maldonado ', '312874598', '', 'alejandrabarbosa2003@gmail.com', 0, 0),
(20, '1022375634', 'Ivan Maldonado', '', '312673805', '', '', 0, 0),
(21, '6578654', 'Fernando Torres', '', '312673805', '', '', 0, 0);

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
  `Pedido` varchar(10000) DEFAULT NULL,
  `cantidad` int(250) DEFAULT NULL,
  `Observaciones` longtext DEFAULT NULL,
  `Fechahora` datetime DEFAULT NULL,
  `Tipopago` varchar(50) DEFAULT NULL,
  `Total` int(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT 'Pendiente',
  `Id_Cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Id_Pedido`, `Pedido`, `cantidad`, `Observaciones`, `Fechahora`, `Tipopago`, `Total`, `Estado`, `Id_Cliente`) VALUES
(2, 'Gordon', 3, 'Casa', '2020-11-19 00:00:00', 'Tarjeta', 299700, 'Pendiente', 73671256),
(3, 'Jose cuervo - Amarillo o blanco ', 8, 'Apto 906 T 7', '2020-11-03 00:00:00', 'Efectivo', 719200, 'Pendiente', 76205639),
(6, 'Hendricks', 2, 'Apto 506 T 2', '2020-11-04 00:00:00', 'Efectivo', 411800, 'Pendiente', 98543765),
(7, 'Don julio añejo', 4, 'Apto 906 T 7', '2020-11-04 00:00:00', 'Tarjeta', 863600, 'Pendiente', 152543895),
(8, 'Don julio añejo', 4, 'Apto 906 T 7', '2020-11-04 00:00:00', 'Efectivo', 863600, 'Pendiente', 764390754),
(10, 'Bombay ', 2, 'Apto 11-03 T 14', '2020-11-04 00:00:00', 'Tarjeta', 319800, 'En proceso', 1022654893),
(11, 'Tanqueray - London Dry Gin', 3, 'Local', '2020-11-04 00:00:00', 'Tarjeta', 437700, 'Pendiente', 1056341893),
(12, 'Hendricks', 2, 'Apto 409 T8', '2020-11-30 17:33:46', 'Efectivo', 411800, 'Pendiente', 65329075),
(55354416, 'Santa Fe ', 3, 'Casa', '2020-12-04 11:16:40', 'Tarjeta', 182700, 'Pendiente', 1056341893),
(55354417, 'Bacardi mojito', 2, 'Local', '2020-12-04 11:17:46', 'Efectivo', 139800, 'Pendiente', 98543765);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_ter`
--

CREATE TABLE `pedidos_ter` (
  `id` int(11) NOT NULL,
  `pedido` varchar(1000) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `observaciones` longtext NOT NULL,
  `tipo_pago` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos_ter`
--

INSERT INTO `pedidos_ter` (`id`, `pedido`, `cantidad`, `observaciones`, `tipo_pago`, `total`, `estado`, `fecha`) VALUES
(5, 'Aguardiente 750mmlCristal 750mlManzanarez 750ml', 246, 'Ninguna', 'Efectivo', '200000', 'Terminado', '2020-11-24 16:55:40'),
(7, 'Aguardiente 750ml', 5, 'Ninguna', 'Efectivo', '50000', 'Terminado', '2020-11-25 13:21:19'),
(0, 'Gordon', 3, 'Casa', 'Tarjeta', '299700', 'Terminado', '2020-11-30 17:09:08'),
(0, 'Tanqueary Ten', 2, 'Apto 807 T09', 'Tarjeta', '411800', 'Terminado', '2020-11-30 20:03:44'),
(0, '1800 Ajeño', 3, 'Apto 807 T09', 'Efectivo', '497700', 'Terminado', '2020-12-02 17:27:48'),
(0, 'Club Colombia Roja', 6, 'casa esquinera', 'Efectivo', '21000', 'Terminado', '2020-12-04 09:49:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(7) NOT NULL,
  `volumen` varchar(100) NOT NULL,
  `FK_Id_Pedido` int(11) NOT NULL,
  `FK_Id_Gerente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `tipo_producto`, `nombre`, `precio`, `volumen`, `FK_Id_Pedido`, `FK_Id_Gerente`) VALUES
(1, 'Aguardiente ', 'Nectar club o verde - Sin azucar', 28900, '375ml', 0, 0),
(2, 'Aguardiente', 'Nectar rojo', 28900, '375ml', 0, 0),
(3, 'Aguardiente', 'Nectar rojo - Sin azucar', 28900, '375ml', 0, 0),
(4, 'Aguardiente', 'Nectar azul - Sin azucar', 31900, '375ml', 0, 0),
(5, 'Aguardiente', 'Antioqueño azul, rojo, verde', 29900, '375ml', 0, 0),
(6, 'Aguardiente', 'Manzanares', 29900, '375ml', 0, 0),
(7, 'Aguardiente', 'Cristal', 50900, '750ml', 0, 0),
(8, 'Aguardiente', 'Nectar club o verde - Sin azucar', 41900, '750ml', 0, 0),
(9, 'Aguardiente', 'Nectar rojo ', 41900, '750ml', 0, 0),
(10, 'Aguardiente', 'Nectar rojo - Sin azucar', 41900, '750ml', 0, 0),
(11, 'Aguardiente', 'Nectar azul - Sin azucar', 45900, '75oml', 0, 0),
(12, 'Aguardiente', 'Antioqueño azul, rojo, verde', 54900, '750ml', 0, 0),
(13, 'Aguardiente', 'Manzanares', 54900, '750ml', 0, 0),
(14, 'Aguardiente', 'Nectar club o verde - Sin azucar', 48900, '1000ml', 0, 0),
(15, 'Aguardiente', 'Nectar rojo ', 48900, '1000ml', 0, 0),
(16, 'Aguardiente', 'Nectar rojo - Sin azucar', 48900, '1000ml', 0, 0),
(17, 'Aguardiente', 'Nectar azul - Sin azucar', 55900, '1000ml', 0, 0),
(18, 'Aguardiente', 'Antioqueño azul, rojo, verde', 64900, '1000ml', 0, 0),
(19, 'Aguardiente', 'Nectar club o verde - Sin azucar', 64900, '1500ml', 0, 0),
(20, 'Aguardiente', 'Nectar club o verde - Sin azucar', 87900, '2000ml', 0, 0),
(21, 'Aguardiente', 'Antioqueño azul, rojo, verde', 114900, '2000ml', 0, 0),
(22, 'Ron', 'Santa Fe ', 28900, '375ml', 0, 0),
(23, 'Ron', 'Caldas', 29900, '375ml', 0, 0),
(24, 'Ron', 'Caldas - Roble blanco', 53900, '750ml', 0, 0),
(25, 'Ron', 'Caldas - Esencial', 53900, '750ml', 0, 0),
(26, 'Ron', 'Medellin', 29900, '375ml', 0, 0),
(27, 'Ron', 'Medellin dorado', 55900, '750ml', 0, 0),
(28, 'Ron', 'Santa Fe 8 años', 59900, '750ml', 0, 0),
(29, 'Ron', 'Caldas 8 años', 93900, '750ml', 0, 0),
(30, 'Ron', 'Medellin 8 años', 93900, '750ml', 0, 0),
(31, 'Ron', 'Zacapa 23 años ', 155900, '750ml', 0, 0),
(32, 'Ron', 'Habana club - Blanco o amarillo', 79900, '750ml', 0, 0),
(33, 'Ron', 'Bacardi superior - Blanco puro', 79900, '750ml', 0, 0),
(34, 'Ron', 'Bacardi limon', 39900, '375ml', 0, 0),
(35, 'Ron', 'Bacardi manzana - Big apple', 69900, '750ml', 0, 0),
(36, 'Ron', 'Bacardi dalquirl', 69900, '750ml', 0, 0),
(37, 'Ron', 'Bacardi mojito', 69900, '750ml', 0, 0),
(38, 'Ron', 'Bacardi añejo', 69900, '750ml', 0, 0),
(39, 'Ron', 'Ron hechicera', 175900, '750ml', 0, 0),
(40, 'Ron', 'Santa Fe ', 50900, '750ml', 0, 0),
(41, 'Ron', 'Caldas', 55900, '750ml', 0, 0),
(42, 'Ron', 'Medellin', 55900, '750ml', 0, 0),
(43, 'Ron', 'Bacardi limon', 69900, '750ml', 0, 0),
(44, 'Ron', 'Santa Fe ', 60900, '1000ml', 0, 0),
(45, 'Ron', 'Caldas', 65900, '1000ml', 0, 0),
(46, 'Ron', 'Medellin', 85900, '1000ml', 0, 0),
(47, 'Tequila', 'Tres caballos', 75900, '1000ml', 0, 0),
(48, 'Tequila', 'El charro - Amarrillo o blanco', 79500, '750ml', 0, 0),
(49, 'Tequila', 'Jose cuervo - Amarrillo o blanco', 49900, '375ml', 0, 0),
(50, 'Tequila', 'Jimador - Amarrillo o blanco', 95900, '750ml', 0, 0),
(51, 'Tequila', 'Olmeca - Amarrillo o blanco ', 89900, '750ml', 0, 0),
(52, 'Tequila', 'Don julio - Reservado blanco ', 195900, '750ml', 0, 0),
(53, 'Tequila', 'Don julio - Reposado amarillo', 205900, '750ml', 0, 0),
(54, 'Tequila', 'Don julio añejo', 215900, '750ml', 0, 0),
(55, 'Tequila', 'Don julio 70 años', 219900, '750ml', 0, 0),
(56, 'Tequila', '1800 Amarillo', 155900, '750ml', 0, 0),
(57, 'Tequila', '1800 Silver o blanco ', 145900, '750ml', 0, 0),
(58, 'Tequila', '1800 Ajeño', 165900, '750ml', 0, 0),
(59, 'Tequila', 'Patron blanco', 209900, '750ml', 0, 0),
(60, 'Tequila', 'Patron amarillo ', 219900, '750ml', 0, 0),
(61, 'Tequila', 'Patron añejo', 229900, '750ml', 0, 0),
(62, 'Tequila', 'Jose cuervo - Amarillo o blanco ', 89900, '750ml', 0, 0),
(63, 'Ginebra', 'Bull dog', 169900, '750ml', 0, 0),
(64, 'Ginebra', 'Beefeater - London Dry Gin', 139900, '750ml', 0, 0),
(65, 'Ginebra', 'Beefeater pink ', 119900, '750ml', 0, 0),
(66, 'Ginebra', 'Bombay ', 159900, '750ml', 0, 0),
(67, 'Ginebra', 'Gordon', 99900, '750ml', 0, 0),
(68, 'Ginebra', 'Tanqueray - London Dry Gin', 145900, '750ml', 0, 0),
(69, 'Ginebra', 'Tanqueary Ten', 205900, '750ml', 0, 0),
(70, 'Ginebra', 'Hendricks', 205900, '750ml', 0, 0),
(71, 'Ginebra', 'The london - Azul o verde ', 190900, '750ml', 0, 0),
(72, 'Cerveza', 'Club Colombia Roja', 3500, '500ml ', 0, 0);

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
  `Identificacion` varchar(10) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Correo_electronico` varchar(50) DEFAULT NULL,
  `FK_Id_Gerente` int(11) NOT NULL,
  `FK_id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `supervisor`
--

INSERT INTO `supervisor` (`id_supervisor`, `Identificacion`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electronico`, `FK_Id_Gerente`, `FK_id_roles`) VALUES
(55, '1234567890', 'Juan', 'Gomez', '43256789', 'Carrear 4 ', 'juan@gmail.com', 0, 0),
(56, '1484566490', 'Cristian', 'Gonzales', '453267', 'carrera 6 ', 'cristian@gmail.com', 0, 0),
(57, '1562345742', 'Brandon', 'Restrepo', '75367', 'Calle 7', 'brandon@gmail.com', 0, 0),
(111, '1006866854', 'Carlos', 'Hernandez', '3209517898', 'Victoria', 'carlos@gmail.com', 0, 2),
(117, '6789432189', 'Hector ', 'Torres', '3227864532', 'Dg 78 D # 89 -09', 'Hector@gmail.com', 0, 0),
(120, '1031149736', 'David', 'Fajardo', '3178947698', 'Cll 36 G sur # 11 A 81', 'alejandrabarbosa2003@gmail.com', 0, 0),
(122, '105643765', 'Yeimy ', 'Montoya', '317839848', 'Cll 45 G sur # 89 - 11', 'alejanmaru45@gmail.com', 0, 0),
(123, '89637923', 'Bernardo', 'Jaramillo ', '3175458478', 'Kr 7 # 56 - 98', 'alejandrabarbosa2003@gmail.com', 0, 0),
(124, '1043732096', 'Mauricio', 'Londoño ', '3117658943', 'Dg 56 # 34 - 03', 'alejandrabarbosa2003@gmail.com', 0, 0),
(125, '1673398563', 'Fernando', 'Gutierrez', '3217869075', 'Kra 78 No 90 67', 'helenchuge@gmail.com', 0, 2),
(127, '1673398563', 'Hernan', 'Gutierrez', '3219086534', 'Cll 78 No 90 67', 'alejandrabarbosa2003@gmail.com', 0, 0),
(128, '1673398563', 'Juan', 'Suarez', '3179862487', 'Cll 8 No 78 90', 'alejandrabarbosa2003@gmail.com', 0, 2),
(145, '1006866854', 'Juan', 'Gomez', '3208619472', 'Victoria', 'juan@email.com', 0, 0);

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
(1, 'Juan', '8cb2237d0679ca88db6464eac60da96345513964', 1, 0),
(2, 'jorge', '8cb2237d0679ca88db6464eac60da96345513964', 3, 3),
(3, 'carlos', '827ccb0eea8a706c4c34a16891f84e7b', 2, 2),
(4, 'diego', '8cb2237d0679ca88db6464eac60da96345513964', 4, 0),
(5, 'jorge', '12345', 3, 3),
(6, 'carlos', '8cb2237d0679ca88db6464eac60da96345513964', 2, 2),
(7, 'diego', '12345', 4, 0),
(8, 'Antonio', 'tJmy5VEMb2Q', 2, 2),
(9, 'David', 'FtSIbqkVHDj', 4, 4),
(10, 'Mariana', 'K3WsRgxASNj', 3, 3),
(11, 'Antonio', 'k8vILUeiK7p', 2, 2),
(12, 'Walter', 'hcYIANb8dpi', 2, 2),
(13, 'Karen', '5Mv9ItQHlNE', 2, 2),
(14, 'Elena', 'ZzIvNquQm2d', 2, 2),
(15, 'Hector', '5S9eTYDErvs', 2, 2),
(16, 'Teresa', 'aK9e0wLDHBZ', 2, 2),
(17, 'Sneider', '158801df6404a4cb98b8db6f569d6b50c2ad933a', 4, 4),
(18, 'Nicolas', 'PSy8glaZHhx', 4, 4),
(19, 'Fernando', 'fA93hyMiv24', 4, 4),
(20, 'William', '1cbDh2B3FCq', 4, 4),
(22, 'Julian', 'q9El4zeogPS', 4, 4),
(23, 'Dilan', '7HiTMKuaU9A', 4, 4),
(24, 'Diego', 'uRWrTz5eEJB', 4, 4),
(25, 'Jaime', 'ZjTtoFzxS2W', 4, 4),
(26, 'Andres', 'azxDQonI1VH', 4, 4),
(27, 'Esteban', 'zshrde1lGKc', 4, 4),
(28, 'Katherine', 'bFgmvh5zAEo', 3, 3),
(29, 'Jeronimo', 'pTBVoWAXPMi', 3, 3),
(30, 'Adrian', 'iWkdsCjGeOg', 3, 3),
(31, 'Lina', 'sxdaOKEqY6R', 3, 3),
(32, 'Laura', 'iQX7x2luagL', 3, 3),
(33, 'Tatiana', 've6TO1o9z3m', 3, 3),
(34, 'Felipe', 'wsMevtdJUhV', 3, 3),
(35, 'Harvey', 'yUS4qNX9itw', 3, 3),
(36, 'Antonio', 'Q6fM2aVIHmE', 3, 3),
(37, 'Gabriel', 'YlBV2Xe8w3n', 3, 3),
(40, 'Antonio', 'YcI2LmFMKr', 2, 2),
(41, 'Yeimy', 'sha1(zt0SAbkG7M)', 2, 2),
(42, 'Bernardo', '589e72b082c73abffb5866ca71cf537f1e6f862c', 2, 2),
(43, 'Mauricio', 'ac0fbceeb038983e099cc8ee8741028bf5ac096e', 2, 2),
(44, '', '417c803f2e6170885185448cbd368a00e1d5edd0', 2, 2),
(45, 'Hernan', '178a8ed2357b5c8f7b9b6a57fdff71e62ee8e6dc', 2, 2),
(46, 'Andres', '27e7346599d0b0a587f76e43f81982555f96a985', 2, 2),
(47, 'Andres', '42c1752cb3a1ed76926d965e95eaefadbaaf1125', 4, 4),
(48, 'Viviana', '96f6149e6da86cc976d97eafccc2972239ba6deb', 3, 3),
(49, 'Ronald', '31ca8c4b8a437b0f3bada423f0f40ddea5a0f3a7', 4, 4),
(50, 'Gina', 'c085b202e9732036ba23e2f902d7044a1cc145c7', 3, 3),
(51, 'Ivan Maldonado', '13996d4852b63520faa613bcdc76e370593bdbce', 3, 3),
(52, 'Fernando Torres', 'ebad92ec9567803cfe73b680e4b181eec1368bb6', 3, 3);

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cliente`);

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
  ADD KEY `Id_Cliente` (`Id_Cliente`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `Id_Devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  MODIFY `id_domiciliario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55354418;

--
-- AUTO_INCREMENT de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id_supervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Id_Cliente` FOREIGN KEY (`Id_Cliente`) REFERENCES `cliente` (`Id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
