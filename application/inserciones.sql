INSERT INTO `curso` (`id`, `nombre`, `dificultad`, `explicacion`, `descripcion`) VALUES (NULL, 'Operaciones básicas', '1', 'Lorem Ipsum Dolor Sit Amet', 'Lorem Ipsum Dolor Sit Amet')
INSERT INTO `pregunta` (`id`, `enunciado`, `tipo_de_respuesta`, `respuesta`, `respuesta_incorrecta1`, `respuesta_incorrecta2`, `respuesta_incorrecta3`, `curso`) 
VALUES 
(NULL, '¿Cuánto es 2 + 2?', 'a', '4', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 2 - 2?', 'o', '0', '1', '-1', '2', '1'), 
(NULL, '¿Cuánto es 2 * 2?', 'a', '4', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 2 / 2?', 'o', '1', '2', '3', '4', '1'), 
(NULL, '¿Cuánto es 2 + 3?', 'a', '5', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 2 - 3?', 'o', '1', '2', '-1', '0', '1'), 
(NULL, '¿Cuánto es 2 * 3?', 'a', '6', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 2 + 4?', 'o', '6', '5', '7', '4', '1'), 
(NULL, '¿Cuánto es 2 - 4?', 'a', '-2', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 2 * 4?', 'o', '8', '16', '4', '2', '1'), 
(NULL, '¿Cuánto es 4 / 2?', 'a', '2', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 2 + 5?', 'o', '7', '6', '8', '5', '1'), 
(NULL, '¿Cuánto es 2 - 5?', 'a', '-3', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 2 * 5?', 'o', '10', '9', '8', '11', '1'), 
(NULL, '¿Cuánto es 6 + 2?', 'a', '8', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 6 * 2?', 'o', '12', '11', '10', '13', '1'), 
(NULL, '¿Cuánto es 6 - 2?', 'a', '4', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 6 / 2?', 'o', '3', '2', '4', '1', '1'), 
(NULL, '¿Cuánto es 7 + 2?', 'a', '9', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuánto es 7 * 2?', 'o', '14', '13', '15', '12', '1')

INSERT INTO `insignia` (`id`, `nombre`, `imagen`, `descripcion`, `curso`) VALUES (NULL, 'Curso de operaciones Básicas aprobado', 'medal1.jpg', 'Esta insignia se otorga a quien haya aprobado el curso de Operaciones Básicas', '1')

INSERT INTO `pregunta` (`id`, `enunciado`, `tipo_de_respuesta`, `respuesta`, `respuesta_incorrecta1`, `respuesta_incorrecta2`, `respuesta_incorrecta3`, `curso`) VALUES (NULL, '¿Cuál es la derivada de 3x?', 'a', '3', NULL, NULL, NULL, '2'), 
(NULL, '¿Cuál es la derivada de 3x^2?', 'o', '6x', '3x^2', '3x', '2x', '2'), 
(NULL, '¿Cuál es la derivada de x^2?', 'a', '2x', NULL, NULL, NULL, '2'), 
(NULL, '¿Cuál es la derivada de 3x - 2x^2?', 'o', '3-4x', '3x', '4x', '3x^2-2x^4', '2'), 
(NULL, '¿Cuál es la derivada de 3x^2?', 'a', '6x', NULL, NULL, NULL, '2'), 
(NULL, '¿Cuál es la derivada de 3x^-2?', 'o', '-6x^-3', '-6x^-1', '6x^-3', '6x^-1', '2'), 
(NULL, '¿Cuál es la derivada de -3x^2?', 'a', '-6x', NULL, NULL, NULL, '1'), 
(NULL, '¿Cuál es la derivada de -3x^-2?', 'o', '6x^-3', '6x^-1', '6x^-3', '-6x^-3', '2'), 
(NULL, '¿Cuál es la derivada de 4x', 'a', '4', NULL, NULL, NULL, '2'), 
(NULL, '¿Cuál es la derivada de 4x + 2x^-1?', 'o', '4-2x^-2', '4+2x^2', '4-2x^-1', '4+2x^-1', '2')