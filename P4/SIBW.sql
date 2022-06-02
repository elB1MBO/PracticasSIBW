-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql:3306
-- Tiempo de generación: 02-06-2022 a las 11:17:50
-- Versión del servidor: 8.0.28
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `SIBW`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `comentario` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_producto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `email`, `fecha`, `comentario`, `id_producto`) VALUES
(1, 'Usuario 1', 'usuario1@gmail.com', '2022-04-24 17:01:10', 'Este es el primer comentario de la mistela\r\n', 1),
(2, 'Usuario 2', 'usuario2@ugr.es', '2022-04-25 22:23:24', 'Este es el segundo comentario de la mistela', 1),
(3, 'Usuario 1', 'usuario1@gmail.com', '2022-06-01 14:13:25', 'Zurrapa de lomo mu rica', 2),
(4, 'pepa', 'pepa@ugr.es', '2022-06-02 07:55:24', 'Me gusta la zurrapa\r\n<br><i id=\'mensajeEdicion\'>Mensaje editado por duran</i>', 2),
(5, 'Juan', 'juan@gmail.com', '2022-06-01 14:21:17', 'Las yemas del tajo son la polla', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen_marca` varchar(255) NOT NULL,
  `producto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `imagen`, `imagen_marca`, `producto`) VALUES
(1, 'mistela.png', 'creatividad-malaga.png', 1),
(2, 'zurrapa blanca.png', 'logo embutidos melgar.png', 2),
(3, 'yemas del tajo.png', 'yemas las campanas.png', 3),
(4, 'morcilla.png', 'logo embutidos melgar.png', 4),
(5, 'zurrapa colora icarben.png', 'icarben.png', 5),
(6, 'rosco vino.png', 'daver.png', 6),
(7, 'chorizo.png', 'logo embutidos melgar.png', 7),
(8, 'zurrapa-higado.png', 'chacinas mendez.png', 8),
(9, 'pestinos-de-miel.png', 'daver.png', 9),
(10, 'logoArriate.png', 'arriate-foto.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabrotas1`
--

CREATE TABLE `palabrotas1` (
  `palabrota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `palabrotas1`
--

INSERT INTO `palabrotas1` (`palabrota`) VALUES
('tonto'),
('tonto'),
('gilipollas'),
('idiota'),
('polla'),
('coño'),
('imbecil'),
('puta'),
('joder'),
('subnormal'),
('puto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `etiqueta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `etiqueta`) VALUES
(1, 'Mistela', '10,95€/1L', '<p>La mistela es un licor elaborado a partir de una infusión de hierbas, a la que se añade azúcar y anís.\r\n</p>\r\n<p>\r\nLa <span class=\"critical-words\">Mistela de Arriate</span> es famosa en gran parte de la provincia de\r\n                Málaga por el intenso y peculiar sabor de\r\n                este licor de hierbas.\r\n                La tradición sobre la elaboración de la mistela es generacional, transmitiéndose la receta de generación\r\n                en\r\n                generación. Son muchas las familias arriateñas que tienen su propia receta de la mistela, pero la receta\r\n                original y más abanderada la posee\r\n                actualmente <span class=\"critical-words\">Miguel López Ramirez</span>.\r\n            </p>\r\n            <p>\r\n                La mistela hoy dia se comercia a nivel nacional, con perspectivas de proyectarse a nivel\r\n                internacional.<br>\r\n                La Mistela de Arriate está reconocida por la Junta de Andalucía como <span\r\n                    class=\"critical-words\">patrimonio Inmaterial de Andalucía</span>, y\r\n                es uno de los licores más tradicionales de la Serranía de Ronda.\r\n            </p>\r\n            <p>Puedes ver más sobre sus ingredientes a través de este \r\n                <a href=\"https://www.youtube.com/watch?v=mUc7aFD7wHk&ab_channel=MistelaDeArriate\" target=\"_blank\">video</a>, \r\n                que nos ofrece el mismo Miguel López.\r\n            </p>\r\n            <p>También puede ser de su interés esta <a href=\"https://www.youtube.com/watch?v=pWnYNxow7JM&ab_channel=GrupoGourmets\" target=\"_blank\">entrevista</a> sobre la Mistela en Sabor a Málaga, donde se presenta una variación de la Mistela, llamada <span class=\"critical-words\">\"Cann Amis\"</span>.</p>', ''),
(2, 'Zurrapa de lomo', '4€/500gr', '<p>La zurrapa de lomo es muy típica de Málaga y Cádiz. Se trata de la manteca que se hace con los restos de la olla, con los pequeños trozos de carne sobrantes. </p>\r\n<p> Este manjar se suele tomar untado en pan, normalmente el <span class=\"critical-words\">mollete de Antequera</span> para un calórico desayuno, ideal para empezar el día. </p>\r\n<p> Hacer la zurrapa es muy fácil, así que si le interesa le dejamos este <a href=\"https://elcomidista.elpais.com/elcomidista/2019/07/22/receta/1563794891_311841.html\" target=\"_blank\">artículo de El Comidista</a> para que puedas aprender cómo se hace. </p>', ''),
(3, 'Yemas del tajo', '4,75€/caja de 9 uds.', '<p>Las yemas del Tajo son un dulce muy típico de Ronda. Este producto solo puede ser vendido bajo el nombre de <span class=\"critical-words\">Yema del Tajo</span> si proviene de su pastelería natal, <span class=\"critical-words\">Las Campanas</span>, habiendo sido patentada por este establecimiento desde 1929. </p>\r\n<p> Tienen un sabor y textura muy similar a las yemas de Santa Teresa aunque de diferente presentación y elaboración. El nombre del dulce hace referencia al Tajo de Ronda. </p>\r\n<p> Su origen viene de un antiguo monasterio de la ciudad de Ronda en el cual las hermanas monjas las elaboraban y vendían a la población. Posteriormente en el siglo XIX empezaron a ser más conocidas y han llegado hasta el día de hoy.</p>\r\n<p> Si desea conocer más, puede ver este <a href=\"https://www.youtube.com/watch?v=fyBT-0y3KxY&ab_channel=CanalSurTurismo\" target=\"_blank\">video</a> donde se muestran desde la propia confitería Las Campanas cómo se hacen este ducle. </p>\r\n<p>Si quieren visitar la confitería <a href=\"https://goo.gl/maps/Uwxgj7eohT2NATKfA\" target=\"_blank\">Las Campanas</a>, se encuentra en plena Plaza del Socorro, Ronda. </p>\r\n', ''),
(4, 'Morcilla de Embutidos Melgar', '4€/350gr', '<p>Morcilla de Embutidos Melgar, otra chacinas ejemplar de la Serranía de Ronda. \r\n<span class=\"critical-words\">Embutidos Melgar</span> es una empresa familiar de más de 3 generaciones, dedicada a la fabricación y elaboración de embutidos tanto de cerdo blanco como de cerdo ibérico. Elaboran una amplia variedad de embutidos.</p>\r\n<p>Se hace un ciclo completo desde la crianza del cerdo en fincas propias, la elaboración y curación de los jamones en secadores naturales, hasta la venta de los productos en puntos de venta propios o a través de otros canales de distribución.</p>', ''),
(5, 'Zurrapa de lomo \"colorá\"', '4,00€/500gr', '<p>La zurrapa de lomo es muy típica de Málaga y Cádiz. Se trata de la manteca que se hace con los restos de la olla, con los pequeños trozos de carne sobrantes. Este manjar se suele tomar untado en pan para un calórico desayuno, ideal para empezar el día.</p>\r\n<p>La zurrapa <span class=\"critical-words\">\"colorá\"</span> se elabora de la misma manera que la normal, sustituyendo la manteca blanca por manteca \"colorá\", la cual se elabora de la misma manera solo que añadiéndole <span class=\"critical-words\">pimentón</span>.</p>\r\n<p>\r\n<span class=\"critical-words\">Icarben</span> es otra importante tienda de embutidos de la Serranía de Ronda, localizada en el pueblo de Benaoján.\r\n</p>', ''),
(6, 'Roscos de vino', '3€/300gr', '<p>Los Roscos de Vino son muy populares a nivel general pero especialmente en toda la provincia de Málaga así que es fácil encontrarlos en cualquier confitería.</p>\r\n\r\n<p>Entre sus ingredientes, destaca la base hecha con harina, sésamo tostado, azúcar y, como no podía ser menos, el <span class=\"critical-words\">vino dulce de Málaga</span>, además de una ralladura de naranja.\r\nFinalmente se decoran rebozándolos con azúcar glas.</p>\r\n\r\n<p>Una de las confiterías más famosas de Ronda donde se puede probar este rico dulce es la confitería <a href=\"https://confiteriadaver.es/\" target=\"_blank\">Daver</a>.</p>', ''),
(7, 'Chorizo de Embutidos Melgar', '3,50€/350gr', '<p>Chorizo de Embutidos Melgar, de las mejores chacinas de la Serranía de Ronda. \r\n<span class=\"critical-words\">Embutidos Melgar</span> es una empresa familiar de más de 3 generaciones, dedicada a la fabricación y elaboración de embutidos tanto de cerdo blanco como de cerdo ibérico. Elaboran una amplia variedad de embutidos.</p>\r\n<p>Se hace un ciclo completo desde la crianza del cerdo en fincas propias, la elaboración y curación de los jamones en secadores naturales, hasta la venta de los productos en puntos de venta propios o a través de otros canales de distribución.</p>', ''),
(8, 'Zurrapa de hígado', '1,70€/250gr', '<p>Zurrapa de hígado elaborada con hígado de cerdo, ajo, laurel, orégano, pimienta y otras especias. </p>\r\n<p>Pese a estar localizada en <span class=\"critical-words\">El Bosque, Cádiz</span>, podremos encontrarnos esta rica zurrapa en muchas cafeterías de la Serranía de Ronda, debido a su calidad y proximidad.</p>', ''),
(9, 'Pestiños con miel', '8€/500gr', '<p>La receta de pestiños es una receta tradicional andaluza con orígenes moriscos, fruto de los siglos de dominación musulmana. Hoy en día se siguen consumiendo, en especial en época navideña, en carnavales y en Semana Santa, siendo la principal discusión sobre los pestiños, la de si están más ricos cubiertos con miel o espolvoreados con azúcar.</p>\r\n<p>Este sabroso y sencillo dulce lo podemos encontrar en la confitería <a href=\"https://confiteriadaver.es/\" target=\"_blank\">Daver</a>, en Ronda, o en <span class=\"critical-words\">Cañete La Real</span>, municipio de la Serranía de Ronda donde destacan estos pestiños.</p>', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `password`, `email`, `tipo`, `username`) VALUES
('bimbo', '$2y$10$HBPQ4FYQm5WgSPGQ6L3Ye.Vpk5sjy8Mm7ZVCfebzEvxUhG0aQTSO.', 'bimbo@gmail.com', 'normal', 'bimbo'),
('duran', '$2y$10$44po1tDnm4NdbPpH9/KtReN6vqF6K0WbQUkQW/XVuyjtwNA0HMsr.', 'duran@ugr.com', 'moderador', 'duran'),
('racero', '$2y$10$pSwPP2XpFZLl7p3jDZ3qYOcQhNFLQ6Yvou7jlP0lLSJDihOPxdz0W', 'racero@correo.ugr.es', 'moderador', 'racero'),
('raul', '$2y$10$bSTYgWlfzqRtuyHMjf6iF.I4WmCU30ymZakHbBMJKm3giYRQ3T2u.', 'raulduran.lacimada@gmail.com', 'gestor', 'raul'),
('Super', '$2y$10$VW62ZQnWQHWNUiQDMQ24MeczI3tRWV/8idpc7xqIR60//Vgo5OF76', 'superusuario@gmail.com', 'super', 'Super'),
('UsuarioXD', '$2y$10$8mkhx8AWQbZOMx3YxqdudOOq1dK0nSyDdPF8oMzRljM0XJ.S0OmjS', 'correo@gmail.com', 'super', 'UsuarioXD');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
