-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 22:22:50
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id_antecedente` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_patologia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `padece` char(30) CHARACTER SET utf8 NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id_antecedente`, `id_paciente`, `id_patologia`, `fecha`, `padece`, `eliminado`) VALUES
(30, 6, 12, '2022-10-11', 'Dolor en los juanetes', 1),
(31, 1, 10, '2022-10-10', 'Dolor  de pecho', 1),
(32, 1, 10, '2022-10-05', 'neuritis', 0),
(33, 1, 9, '2022-10-04', 'neuritis', 0),
(34, 11, 9, '2022-10-03', 'Dolor de pecho', 0),
(35, 6, 9, '2022-12-15', 'neuritis', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `nombre_responsable` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numero_responsable` int(20) NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `direccion`, `fecha_hora`, `nombre_responsable`, `numero_responsable`, `eliminado`) VALUES
(15, 'Barrio Obrero Calle 12 con Car', '2022-12-11 10:20:00', 'Olga Mora', 412654788, 0),
(19, 'Pasaje Cumana edif. Los Juanes', '2022-07-02 22:20:00', 'Javier Lozada', 412654782, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_consulta` datetime NOT NULL DEFAULT current_timestamp(),
  `peso` float NOT NULL,
  `unidad_peso` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `talla` float NOT NULL,
  `unidad_talla` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `presion_arterial` float NOT NULL,
  `diagnostico` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `tratamiento` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `proxima_consulta` date NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `id_paciente`, `fecha_consulta`, `peso`, `unidad_peso`, `talla`, `unidad_talla`, `presion_arterial`, `diagnostico`, `tratamiento`, `proxima_consulta`, `eliminado`) VALUES
(13, 1, '2022-10-10 14:02:48', 1, 'Kilogramos', 1, 'Metros', 22, 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).\r\n\r\n', 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).\r\n\r\n', '2022-01-01', 0),
(15, 8, '2022-10-10 14:12:12', 10, 'Gramos', 10, ' Metros', 120, 'j', 'j', '0007-07-07', 0),
(16, 8, '2022-10-10 14:15:11', 452, 'Kilogramos', 50, 'Metros', 120, 'aaa', 'aaa', '0006-06-06', 0),
(24, 6, '2022-10-18 15:15:33', 80, 'Kilogramos', 1.7, 'Metros', 120, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', '2022-10-18', 0),
(26, 6, '2022-10-18 17:28:35', 10, 'Kilogramos', 10, 'Metros', 233, 'Aunque no posee actualmente fuentes para justificar sus hipótesis, el profesor de filología clásica Richard McClintock asegura que su uso se remonta a los impresores de comienzos del siglo xvi.1​ Su uso en algunos editores de texto muy conocidos en la actualidad ha dado al texto lorem ipsum nueva popularidad.\r\n\r\nEl texto en sí no tiene sentido aparente, aunque no es aleatorio, sino que deriva de un texto de Cicerón en lengua latina, a cuyas palabras se les han eliminado sílabas o letras. El significado del mismo no tiene importancia, ya que solo es una demostración o prueba. El texto procede de la obra De finibus bonorum et malorum (Sobre los límites del bien y del mal) que comienza con:', 'Aunque no posee actualmente fuentes para justificar sus hipótesis, el profesor de filología clásica Richard McClintock asegura que su uso se remonta a los impresores de comienzos del siglo xvi.1​ Su uso en algunos editores de texto muy conocidos en la actualidad ha dado al texto lorem ipsum nueva popularidad.\r\n\r\nEl texto en sí no tiene sentido aparente, aunque no es aleatorio, sino que deriva de un texto de Cicerón en lengua latina, a cuyas palabras se les han eliminado sílabas o letras. El significado del mismo no tiene importancia, ya que solo es una demostración o prueba. El texto procede de la obra De finibus bonorum et malorum (Sobre los límites del bien y del mal) que comienza con:', '2022-10-06', 1),
(27, 2, '2022-10-18 17:30:27', 60, 'Kilogramos', 1.71, ' Metros', 110, 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).\r\n\r\n', 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).\r\n\r\n', '2022-10-18', 0),
(28, 10, '2022-10-20 14:34:03', 76, 'Kilogramos', 190, 'Metros', 120, 'Dolor de espalda', 'Ibuprofeno cada 6 horas de 500mg', '2022-11-01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nacionalidad` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `documento_identidad` int(20) NOT NULL,
  `cargo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `nacionalidad`, `documento_identidad`, `cargo`, `fecha_nacimiento`, `sexo`, `direccion`, `telefono`, `eliminado`) VALUES
(9, 'Maria Jose', 'Jurado Alviarez', 'Venezolano (a)', 12345678, 'Ayudante (a)', '1976-08-05', 'Femenino', 'Cuartel Bolivar calle 15 carrera 9', 4161327115, 0),
(10, 'Banlly Karina ', 'Maldonado de Muñoz', 'Extranjero (a)', 31258056, 'Enfermero (a)', '1975-12-13', 'Femenino', 'La Castra Bloque 15 apto 03-05', 4268742985, 1),
(11, 'Martha Cecilia', 'Gomez Sanchez', 'Venezolano (a)', 1845628753, 'Doctor (a)', '1995-05-12', 'Femenino', 'Urbanización San Rafael Calle 01- Casa número 15', 3176983435, 1),
(12, 'Manuel Sebastian', 'Sayago Mendez', 'Venezolano (a)', 19861347, 'Secretario (a)', '1989-10-12', 'Masculino', 'Av. Rotaria Urb. Romulo Colmenares calle 1 casa 13', 4129583488, 0),
(13, 'Deysy Consuelo ', 'Jara colmenares', 'Venezolano (a)', 20564855, 'Doctor (a)', '1987-01-21', 'Femenino', 'Av. Rotaria Urb. Romulo Colmenarez', 4147520673, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nacionalidad` varchar(20) CHARACTER SET utf8 NOT NULL,
  `documento_identidad` int(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `sexo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8 NOT NULL,
  `numero_paciente` int(20) NOT NULL,
  `eliminado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido`, `nacionalidad`, `documento_identidad`, `fecha_nacimiento`, `telefono`, `sexo`, `direccion`, `numero_paciente`, `eliminado`) VALUES
(1, 'Sandia Emily', 'Sanchez Hernandez', 'Venezolano (a)', 12799625, '1999-12-17', 4247735296, 'Femenino', 'Calle Principal, San Josecito Edificio San Marcos ', 50004, 0),
(6, 'Banlly Karina ', 'Maldonado de Muñoz', 'Venezolano (a)', 12753423, '1975-12-13', 4147290605, 'Femenino', 'Carrera 6, con C. 3, casa numero 19', 50001, 0),
(11, 'Juan David', 'Perez Sanchez', 'Venezolano (a)', 2147483647, '1995-12-06', 2396418533, 'Femenino', 'Barrio Obrero calle 3 con carrera 1', 50002, 0),
(12, 'Marcela Carolina', 'Fredez Viral', 'Venezolano (a)', 29852664, '1992-12-17', 4249785242, 'Femenino', 'Ent. Principal al Tope, Capacho, Táchira', 50003, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias`
--

CREATE TABLE `patologias` (
  `id_patologia` int(11) NOT NULL,
  `nombre_patologia` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `patologias`
--

INSERT INTO `patologias` (`id_patologia`, `nombre_patologia`, `descripcion`, `eliminado`) VALUES
(9, 'Insuficiencia cardíaca del lado izquierdo', 'En general, la insuficiencia cardíaca comienza en el lado izquierdo, específicamente, en el ventrículo izquierdo, que es la cavidad de bombeo principal del corazón. Puede acumularse líquido en tus pulmones, lo que causará dificultad para respirar.', 0),
(10, 'Diabetes tipo 1', 'Afección crónica en la que el páncreas produce poco o nada de insulina.\r\nSuele ocurrir en la adolescencia.\r\nLos síntomas incluyen sed, micción frecuente, hambre, cansancio y visión borrosa.\r\nEl objetivo del tratamiento es mantener niveles normales de azúcar en la sangre mediante el control regular, la insulinoterapia, la dieta y el ejercicio.', 0),
(12, 'Síndrome de Down (Trisomia 21)', 'Trastorno genético de los cromosomas del par 21 que provoca retraso intelectual y del desarrollo.\r\nEl síndrome de Down es un trastorno genético ocasionado cuando una división celular anormal produce material genético adicional del cromosoma 21.\r\nEl síndrome de Down se caracteriza por una apariencia física típica, discapacidad intelectual y retrasos en el desarrollo. Además, puede estar asociado con enfermedades cardíacas o de la glándula tiroides.\r\nLos programas de intervención temprana con un equipo de terapeutas y educadores especiales que tratan la situación específica de cada niño pueden ser útiles para el tratamiento del síndrome de Down.', 0),
(13, 'Yubelka', 'prueba', 1),
(14, 'Síndrome Vagal', 'Desmayo común. El síncope o crisis vasovagal es la pérdida súbita, breve y transitoria del estado de conciencia, con recuperación espontánea y total, originada por una alteración de los mecanismos del sistema nervioso que controlan la presión arterial y la frecuencia cardiaca.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id_recibo` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `numero_recibo` int(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `precio` float NOT NULL,
  `concepto` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`id_recibo`, `id_paciente`, `id_empleado`, `numero_recibo`, `fecha`, `precio`, `concepto`, `eliminado`) VALUES
(120, 11, 11, 5001, '2022-10-11 14:31:00', 20, 'Pago procesado', 0),
(121, 1, 11, 5003, '2022-10-11 14:31:00', 15, 'Pago procesado', 0),
(122, 12, 12, 5002, '0000-00-00 00:00:00', 30, 'Pago procesado', 1),
(123, 1, 12, 12, '2022-10-25 16:06:57', 30, 'prueba 1', 1),
(124, 1, 12, 5023, '2022-10-26 08:29:50', 30, 'Pago procesado', 1),
(125, 1, 12, 2000003, '2022-10-26 09:07:52', 20, 'pago', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `tipo_rol` varchar(20) CHARACTER SET utf8 NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo_rol`, `eliminado`) VALUES
(1, 'Administrador (a)', 0),
(2, 'Editor (a)', 0),
(3, 'Lector (a)', 0),
(4, 'Escritor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contrasena` text CHARACTER SET utf8 NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_empleado`, `id_rol`, `correo`, `contrasena`, `eliminado`) VALUES
(17, 9, 2, 'yubelkam@gmail.com', '$2y$10$xoAGZkRWj.yyf', 1),
(18, 9, 2, 'admin@admin', '$2y$10$hhYQet4/7r6T6', 1),
(19, 13, 1, 'Deysy@gmail.com', '$2y$10$A/erfho82/7UZ6rQapao4.ZGh13c2Re1.XBNSXF60ZkrrDIJFNVMe', 0),
(20, 9, 1, 'yurimar2003@gmail.com', '$2y$10$7k3GqEzB7JEMF3sVzloNduOeR/CLozSs4/4Q9PrL/AS.CHPNLsL7S', 0),
(21, 12, 2, 'manuel12@gmail.com', '$2y$10$HUO.4YJyriRFoJzVgvxdq.PyPo/vO3D4MSGZPWu2n/yok321E4uFC', 0),
(22, 11, 3, 'brayhanG@gmail.com', '$2y$10$xSeGGOZcOnw65K5g4yfm8O1.mvb9.xKxquARiP6CYqU/.CcgI1Pvu', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id_antecedente`),
  ADD KEY `id_paciente` (`id_paciente`,`id_patologia`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `patologias`
--
ALTER TABLE `patologias`
  ADD PRIMARY KEY (`id_patologia`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`,`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id_antecedente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `id_patologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
