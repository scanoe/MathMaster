CREATE TABLE estudiante (
	nombre_usuario  	VARCHAR(15)   NOT NULL,
	nombre           	VARCHAR(30)  NOT NULL,
	fecha_nacimiento	DATE  NOT NULL,
	contraseña          VARCHAR(256)   NOT NULL,
	genero           	VARCHAR(1) DEFAULT 'F'   NOT NULL,
	monedas             INTEGER UNSIGNED DEFAULT 0  NOT NULL,
	puntos             	INTEGER UNSIGNED DEFAULT 0  NOT NULL,
	PRIMARY KEY (nombre_usuario)
) ENGINE = InnoDB;

CREATE TABLE curso (
	id 			INT NOT NULL AUTO_INCREMENT,
	nombre      VARCHAR(100)  NOT NULL ,
	dificultad  INT(1)  NOT NULL,
	explicacion	LONGTEXT NOT NULL,
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

CREATE TABLE insignia (
	id 			INT NOT NULL AUTO_INCREMENT,
	nombre		VARCHAR(100)  NOT NULL ,
	imagen      VARCHAR(2000)  NOT NULL,
	descripcion	VARCHAR(1000) NOT NULL,
	curso 		INT NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT insignia_curso FOREIGN KEY (curso) REFERENCES curso (id)
) ENGINE = InnoDB;

CREATE TABLE insiginiaXestudiante (
	id_insignia			INT  NOT NULL ,
	nombre_usuario		VARCHAR(15)  NOT NULL,
	CONSTRAINT id_insiginia FOREIGN KEY (id_insignia) REFERENCES insignia (id),
	CONSTRAINT estudiante_insignia FOREIGN KEY (nombre_usuario) REFERENCES estudiante (nombre_usuario),
	PRIMARY KEY (id_insignia,nombre_usuario)
) ENGINE = InnoDB;

CREATE TABLE profesor (
	nombre_usuario VARCHAR(15) NOT NULL ,
	nombre VARCHAR(30) NOT NULL ,
	fecha_nacimiento DATE NOT NULL ,
	contraseña VARCHAR(256) NOT NULL ,
	genero VARCHAR(1) NOT NULL ,
	correo VARCHAR(40) NOT NULL ,
	area_trabajo VARCHAR(40) NOT NULL ,
	PRIMARY KEY (nombre_usuario)
) ENGINE = InnoDB;