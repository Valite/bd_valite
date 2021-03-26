CREATE DATABASE IF NOT EXISTS BD_PELICULAS DEFAULT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

USE BD_PELICULAS;

CREATE TABLE IF NOT EXISTS GENEROS(
     id INT PRIMARY KEY,
     nombre VARCHAR(255) NOT NULL,
     descripcion TEXT,
     numpeliculas INT NOT NULL DEFAULT 0
)ENGINE=InnoDB CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

CREATE TABLE IF NOT EXISTS VISTO(
     id INT PRIMARY KEY,
     nombre VARCHAR(2) NOT NULL
)ENGINE=InnoDB CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

CREATE TABLE IF NOT EXISTS PELICULAS(
     id INT PRIMARY KEY AUTO_INCREMENT,
     nombre VARCHAR(255) NOT NULL,
     duracion INT NOT NULL,
     ano DATE,
     visto INT NOT NULL,
     genero INT NOT NULL,
CONSTRAINT FK1_PELICULAS_GENERO FOREIGN KEY(genero)
 REFERENCES GENEROS(id) ON UPDATE CASCADE ON DELETE NO ACTION,
CONSTRAINT FK2_PELICULAS_VISTO FOREIGN KEY (visto)
 REFERENCES VISTO(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=InnoDB CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

DROP TRIGGER IF EXISTS SUMAPELICULAS;

DELIMITER |

CREATE TRIGGER SUMAPELICULAS AFTER INSERT ON PELICULAS
FOR EACH ROW

BEGIN
     UPDATE GENEROS
          SET numpeliculas = numpeliculas + 1
     WHERE GENEROS.id = NEW.genero;
END |

DELIMITER ;

DROP TRIGGER IF EXISTS RESTAPELICULAS;

DELIMITER |

CREATE TRIGGER RESTAPELICULAS AFTER DELETE ON PELICULAS
FOR EACH ROW

BEGIN
     UPDATE GENEROS
          SET numpeliculas = numpeliculas - 1
     WHERE GENEROS.id = OLD.genero;
END |

DELIMITER ;

DROP TRIGGER IF EXISTS ACTUALIZAPELICULAS;

DELIMITER |

CREATE TRIGGER ACTUALIZAPELICULAS AFTER UPDATE ON PELICULAS
FOR EACH ROW

BEGIN
     UPDATE GENEROS
          SET numpeliculas = numpeliculas + 1
     WHERE GENEROS.id = NEW.genero;

     UPDATE GENEROS
          SET numpeliculas = numpeliculas - 1
     WHERE GENEROS.id = OLD.genero;
END |

DELIMITER ;

INSERT INTO GENEROS(id,nombre,descripcion) VALUES
(0,'Thriller','También llamado intriga, aborda sucesos criminales o que entrañan amenazas de muerte'),
(1,'Gangsters y Mafiosos','Agrupa a películas que tratan el crimen organizado'),
(2,'Cine Negro','Personajes estereotipados, historias dramáticas con conflictos y criminalidad'),
(3,'Musical','Otorga importancia al espectáculo de la música a través de canciones, bailes o coreografías'),
(4,'Cine Bélico','Ambientado en guerras históricas de la historia universal'),
(5,'Western','Narra sucesos ubicados en el Oeste norteamericano en la segunda mitad del siglo XIX'),
(6,'Terror','Películas que provocan en el espectador miedo, angustia u horror'),
(7,'Ciencia Ficción','Narran historias imaginarias, caracterizadas por un desarrollo tecnológico mayor'),
(8,'Aventuras','Género ambientao en un mundo heroico, con combates, luchas y aventuras'),
(9,'Acción','Secuencias donde prima el dinamismo, persecuciones, huidas, carreras y combates'),
(10,'Humor','Busca la carcajada en el espectador mediante episodios de humor elemental o absurdo'),
(11,'Animacion','Filmación de dibujos o muñecos fotograma a fotograma'),
(12,'Drama','Plantea conflictos entre los principales personajes de la narración fílmica'),
(13,'Histórico','Transfondo histórico como telón para desarrollar el film'),
(14,'Fantástico','Historias fantásticas e imaginarias');

INSERT INTO VISTO(id,nombre) VALUES
(0,"No"),
(1,"Si");
