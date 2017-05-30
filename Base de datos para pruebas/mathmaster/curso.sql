-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2017 a las 21:44:33
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
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `dificultad` int(1) NOT NULL,
  `explicacion` longtext NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `dificultad`, `explicacion`, `descripcion`) VALUES
(1, 'Derivadas I', 2, 'DERIVADA DE UNA CONSTANTE POR UNA FUNCIÓN\r\nf es derivable en x=a\r\n(kf(a))\' = k.f\'(a)\r\n\r\nDERIVADA DE LA SUMA\r\nLa derivada de una suma de funciones es la suma de las derivadas de cada función.\r\nf es derivable en x=a, g es derivable en x=a\r\nf+g es derivable en x=a\r\n(f+g)\'(a) = f\'(a) + g\'(a)\r\nEJEMPLO:\r\nf(x) = x^2; g(x) = 2x; (f+g)(x) = x^2+2x => (f+g)\'(x) = f\'(x) + g\'(x) = 2x+2\r\n\r\nDERIVADA DE UN POLINOMIO\r\nLa derivada de un polinomio es el exponente por la variable elevada al exponente menos uno\r\nf(x) = x^a => f\'(x) = ax^(a-1)\r\nEJEMPLO:\r\nf(x) = x^2 => f\'(x) = 2x\r\n\r\nDERIVADA DE UNA RAÍZ\r\nConcención: Entiéndase raiz[n](a) como raíz enésima de a.\r\nTeniendo en cuenta que raiz[n](x^a) = x^(a/n)\r\nEntonces de esta forma la derivada de una raíz se puede resolver como un polinomio.\r\nEJEMPLO:\r\nSi f(x) = raz[3](x^2) entonces f(x) puede escribirse como f(x)=x^(2/3) entonces f\'(x) se puede resolver como un polinomio, entonces:\r\nSi  f(x)=x^(2/3) => f\'(x) = (2/3)x^(-1/3)\r\n\r\nDERIVADA DE e^x:\r\nLa derivada de e^x = e^x\r\n\r\nDERIVADA DE LA FUNCIÓN LOGARÍTMICA:\r\nf(x) = ln(x) => f\'(x) = 1/x\r\n\r\nDERIVADA DE FUNCIONES TRIGONOMÉTRICAS:\r\nf(x) = cosx => f\'(x) = -senx\r\nf(x) = senx => f\'(x) = cosx\r\nf(x) = tanx => f\'(x) = sec^2(x)\r\nf(x) = cotx => f\'(x) = -csc^2(x)\r\nf(x) = secx => f\'(x) = sec(x)tan(x)\r\nf(x) = cscx => f\'(x) = -csc(x)cot(x)', 'Curso de derivadas de polinomios, funciones exponenciales, logarítmicas, raices y trigonométricas'),
(2, 'Derivadas II', 3, 'DERIVADA DE LA SUMA DE FUNCIONES\r\nConsideremos n funciones diferenciables en algún intervalo I y definamos la suma de las funciones así:\r\nw(x) = f(x)+g(x)+h(x)+......n(x), entonces:\r\nw\'(x) = f\'(x)+g\'(x)+h\'(x)+......n\'(x)\r\nEJEMPLO:\r\n¿Cuál es la derivada de 3x+senx+4x^2?\r\nPara este caso n = 3, con tres funciones: f(x) = 3x, g(x)=senx, h(x)=4x^2, entonces\r\nf\'(x) = 3, g\'(x)=cosx, h\'(x)=8x\r\nAsí, w(x) = f(x)+g(x)+h(x) = 3x+senx+4x^2 y\r\nw\'(x) = f\'(x)+g\'(x)+h\'(x) = 3 + cosx + 8x\r\n\r\nDERIVADA DE UN PRODUCTO\r\nLa derivada del producto de dos funciones es igual al primer factor por la derivada del segundo más el segundo factor por la derivada del primero.\r\nf(x)*g(x) = f\'(x)g(x) + g\'(x)f(x)\r\nEJEMPLO:\r\n¿Cuál es la derivada de f(x)=(x^2-1)(x^3+3x)?\r\nEl primero factor es u = x^2-1\r\nEl segundo factor es v = x^3+3x\r\nEntonces f\'(x) = u\'v+uv\'\r\n\r\nEntonces hay que hayar las derivadas de ambos factores. Al ser polinomios estas derivadas se realizan como se explicó en el curso 1 de derivadas, entonces:\r\nu\' = 2x\r\nv\' = 3x^2+3\r\nEntonces f\'(x) = u\'v+uv\' => f(x) = (2x)(x^3+3x)+(x^2-1)(3x^2+3)\r\n=======>Aplicamos ley distributiva para destruir los paréntesis, entonces:\r\nf\'(x) = (2x)(x^3+3x)+(x^2-1)(3x^2+3) = 2x^4+6x^2+3x^4+3x^2-3\r\n=======>Agrupamos exponentes iguales y obtenemos la solución:\r\nf\'(x) = 5x^4+6x^2-3\r\n\r\nDERIVADA DE UN COCIENTE:\r\nConsideremos dos funciones diferenciables en algún intervalo I y definamos el cociente de las funciones así:\r\nw(x) = f(x)/g(x)\r\nSe puede demostrar que la derivada del cociente de las funciones viene dada por:\r\nw\'(x)=(f\'(x)g(x)-f(x)g\'(x))/(g(x))^2\r\nEJEMPLO:\r\n¿Cuál es la derivada de senx/cosx?\r\nPara este ejercicio f(x) = senx y g(x) = cosx\r\nEntonces: f\'(x) = cosx y g\'(x) = -senx\r\nAplicando la regla del cociente tenemos que:\r\nw(x) = (-sen(x)sen(x) - cos(x)cos(x))/sen^2(x)\r\nw(x) = (-sen^2(x) -cos^2(x))/sen^2(x)\r\nComo sen^2(x) + cos^2(x) = 1 entonces\r\nw(x) = -1/sen^2(x)\r\nPor identidades trigonométricas se sabe que 1/senx = cscx entonces:\r\nw(x) = -1/sen^2(x) = -csc^2(x)', 'Derivada de una suma, derivada de un producto y derivada de un cociente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
