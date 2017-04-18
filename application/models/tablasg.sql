CREATE TABLE estudiante (
	nombre_usuario  	VARCHAR(15)   NOT NULL,
	nombre           	VARCHAR(30)  NOT NULL,
	fecha_nacimiento	DATE  NOT NULL,
	contraseña          VARCHAR(49)   NOT NULL,
	genero           	VARCHAR(1)   NOT NULL,
	monedas             INTEGER UNSIGNED DEFAULT 0  NOT NULL,
	puntos             	INTEGER UNSIGNED DEFAULT 0  NOT NULL,
	PRIMARY KEY (nombre_usuario)
) ENGINE = InnoDB;

CREATE TABLE curso (
	id 			INT NOT NULL AUTO_INCREMENT,
	nombre      VARCHAR(100)  NOT NULL ,
	dificultad  VARCHAR(20)  NOT NULL,
	explicacion	VARCHAR(1000) NOT NULL,
	descripcion VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE pregunta (
	id   					INT(200) NOT NULL AUTO_INCREMENT,
	enunciado           	VARCHAR(10000) NOT NULL,
	tipo_de_respuesta      	VARCHAR(1) NOT NULL,
	respuesta            	VARCHAR(100) NOT NULL,
	respuesta_incorrecta1	VARCHAR(100),
	respuesta_incorrecta2   VARCHAR(100),
	respuesta_incorrecta3   VARCHAR(100),
	curso					INT NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT curso_pregunta FOREIGN KEY (curso) REFERENCES curso (id)
) ENGINE = InnoDB;

CREATE TABLE lista_cursos_aprobados (
	nombre_usuario	VARCHAR(15) NOT NULL,
	curso			INT NOT NULL,
	PRIMARY KEY (nombre_usuario,curso),
	CONSTRAINT curso_usuario FOREIGN KEY (curso) REFERENCES curso (id),
	CONSTRAINT estudiante_curso FOREIGN KEY (nombre_usuario) REFERENCES estudiante (nombre_usuario)
) ENGINE = InnoDB;

CREATE TABLE insiginia (
	nombre		VARCHAR(100)  NOT NULL ,
	imagen      VARCHAR(2000)  NOT NULL,
	descripcion	VARCHAR(1000) NOT NULL,
	curso 		INT NOT NULL,
	PRIMARY KEY (nombre),
	CONSTRAINT insiginia_curso FOREIGN KEY (curso) REFERENCES curso (id)
) ENGINE = InnoDB;

CREATE TABLE insiginiaXestudiante (
	nombre_insiginia	VARCHAR(100)  NOT NULL ,
	nombre_usuario		VARCHAR(15)  NOT NULL,
	CONSTRAINT insiginia_usuario FOREIGN KEY (nombre_insiginia) REFERENCES insiginia (nombre),
	CONSTRAINT estudiante_insiginia FOREIGN KEY (nombre_usuario) REFERENCES estudiante (nombre_usuario),
	PRIMARY KEY (nombre_insiginia,nombre_usuario)
) ENGINE = InnoDB;