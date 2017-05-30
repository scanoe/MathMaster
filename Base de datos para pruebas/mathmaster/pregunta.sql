-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2017 a las 21:46:40
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mathmaster`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(200) NOT NULL,
  `enunciado` varchar(10000) NOT NULL,
  `tipo_de_respuesta` varchar(1) NOT NULL,
  `respuesta` varchar(100) NOT NULL,
  `respuesta_incorrecta1` varchar(100) DEFAULT NULL,
  `respuesta_incorrecta2` varchar(100) DEFAULT NULL,
  `respuesta_incorrecta3` varchar(100) DEFAULT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `enunciado`, `tipo_de_respuesta`, `respuesta`, `respuesta_incorrecta1`, `respuesta_incorrecta2`, `respuesta_incorrecta3`, `curso`) VALUES
(1, '¿Cuál es la derivada de 3x?', 'a', '3', '', '', '', 1),
(2, '¿Cuál es la derivada de 3x^3?', 'c', '9x^2', '9x^3', '9x^4', '12x^4', 1),
(4, '¿Cuál es la derivada de 5x^4?', 'c', '20x^3', '20x^4', '20x^5', '4x^5', 1),
(5, '¿Cuál es la derivada de 9x^5', 'a', '45x^4', '', '', '', 1),
(9, '¿Cuás es la derivada de x^7?', 'a', '7x^6', '', '', '', 1),
(10, '¿Cuál es la derivada de x^(1/2)?', 'c', '(x^(-1/2))/2', '(x^(1/2))/2', '2x^(-1/2))', '-2x^(-1/2)', 1),
(12, '¿Cuál es la derivada de raiz[3](x^2)', 'c', '(2/3)x^(-1/3)', '(3/2)x^(-1/3)', '(2/3)x^(1/3)', '(3/0)x^(1/3)', 1),
(13, '¿Cuál es la derivada de raiz[4](x^3)', 'a', '(3/4)x^(1/3)', '', '', '', 1),
(14, '¿Cuál es la derivada de raiz[5](x^3)', 'a', '(3/5)x^(2/3)', '', '', '', 1),
(15, '¿Cuál es la derivada de raiz[2](x^-3)', 'c', '(-3/2)x^(-5/2)', '(-3/2)x(5/2)', '(3/2)x^(-5/2)', '(3/2)x^(5/2)', 1),
(16, '¿Cuál es la derivada de raiz[7](x^5)', 'a', '(5/7)x^(-2/7)', '', '', '', 1),
(17, '¿Cuál es la derivada de cosx?', 'a', '-senx', '', '', '', 1),
(18, '¿Cuál es la derivada de senx?', 'c', 'cosx', '-cosx', 'cos(x)sen(x)', 'tanx', 1),
(19, '¿Cuál es la derivada de tanx?', 'a', 'sec^2(x)', '', '', '', 1),
(20, '¿Cuál es la derivada de cotx?', 'c', '-csc^2(x)', '-cot^2(x)', '-sec^2(x)', '-tan^2(x)', 1),
(21, '¿Cuál es la derivada de secx?', 'c', 'sec(x)tan(x)', '-sec(x)tan(x)', 'sen(x)cos(x)', 'csc(x)tan(x)', 1),
(22, '¿Cuál es la derivada de e^x?', 'a', 'e^x', '', '', '', 1),
(23, '¿Cuál es la derivada de ln(x)?', 'c', '1/x', 'e^x', 'x', 'ln(x)', 1),
(3, '¿Cuál es la derivada de 3x^3 + 2x +5?', 'a', '9x^2+2', '', '', '', 2),
(6, '¿Cuál es la derivada de 6x^3+2x^2-6x?', 'c', '18x^2+4x-6', '18x^2+4x+6', '6x^2+2x-6', '6x^2+2x+6', 2),
(7, '¿Cuál es la derivada de 9x^-2+6x^-4-2x^(1/2)', 'c', '-18x^-3-24x^-5-2^(-1/2)', '18x^-3+24x^-5+2^(-1/2)', '18x^3+24x^5+2^(1/2)', '18x^-3+24x^-5+2^(1/2)', 2),
(8, '¿Cuál es la derivada de (x^-1)+2x^2+5?', 'a', '-x^-2+4x', '', '', '', 2),
(11, '¿Cuál es la derivada de (5x^2-3)(x^2+x+4)', 'a', '20x^3+15x^2+32x-3', '', '', '', 2),
(24, '¿Cuál es la derivada de 5x^4-2x^3+6x^2+x+1?', 'a', '20x^3-6x^2+12x+1', '', '', '', 2),
(25, '¿Cuál es la derivada de e^x + x^2?', 'c', 'e^x + 2x', 'xe^x + x', 'e^x + x^3', '2xe^x', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_pregunta` (`curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `curso_pregunta` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
