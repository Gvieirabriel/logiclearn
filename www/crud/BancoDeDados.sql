CREATE DATABASE DB;

USE DB;

create table tbPessoa (
    idPessoa INTEGER NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    nome varchar(50),
    senha varchar(255),
    email varchar(30) not null unique,
	GRR_OU_OOUTROGRR varchar(30) not null unique,
    tipo enum('A','P') not null
);

CREATE TABLE tbCurso(
	idCurso INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomeCurso varchar(50),
    idPessoa INTEGER NOT NULL, 
    FOREIGN KEY (idPessoa) REFERENCES tbPessoa(idPessoa) ON UPDATE CASCADE
);

CREATE TABLE tbParticipa(
	idCurso INTEGER NOT NULL,
    idPessoa INTEGER NOT NULL,
    PRIMARY KEY (idCurso, idPessoa),
    FOREIGN KEY (idPessoa) REFERENCES tbPessoa(idPessoa) ON UPDATE CASCADE,
    FOREIGN KEY (idCurso) REFERENCES tbCurso(idCurso) ON UPDATE CASCADE
);

CREATE TABLE tbDisciplina(
	idDisciplina INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomeDisciplina varchar(50)
);

CREATE TABLE tbDisciplinaCurso(
	idCurso INTEGER NOT NULL,
    idDisciplina INTEGER NOT NULL,
    PRIMARY KEY (idCurso, idDisciplina),
    FOREIGN KEY (idDisciplina) REFERENCES tbDisciplina(idDisciplina) ON UPDATE CASCADE,
    FOREIGN KEY (idCurso) REFERENCES tbCurso(idCurso) ON UPDATE CASCADE
);

CREATE TABLE tbAssunto( 
	idAssunto INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomeAssunto varchar(50),
	idDisciplina INTEGER NOT NULL,
    FOREIGN KEY (idDisciplina) REFERENCES tbDisciplina(idDisciplina) ON UPDATE CASCADE
);

CREATE TABLE tbListaExercicio(
	idListaExercicio INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomeListaExercicio varchar(50),
	descricao varchar(255),
    dataLista DATETIME,
    idAssunto INTEGER NOT NULL,
    FOREIGN KEY (idAssunto) REFERENCES tbAssunto(idAssunto) ON UPDATE CASCADE
);

CREATE TABLE tbQuestao(
	idQuestao INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    enunciado varchar(255),
	questaoCorreta char not null,
    likes int,
    deslikes int,
    idListaExercicio INTEGER NOT NULL,
    FOREIGN KEY (idListaExercicio) REFERENCES tbListaExercicio(idListaExercicio) ON UPDATE CASCADE
);

CREATE TABLE tbAlternativa(
	idAlternativa INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    enunciado varchar(255),
	letra char not null,
    idQuestao INTEGER NOT NULL,
	idPessoa INTEGER NOT NULL,
    FOREIGN KEY (idPessoa) REFERENCES tbPessoa(idPessoa) ON UPDATE CASCADE,
    FOREIGN KEY (idQuestao) REFERENCES tbQuestao(idQuestao) ON UPDATE CASCADE
);

CREATE TABLE tbListaExercicioPessoa(
	idPessoa INTEGER NOT NULL,
    idListaExercicio INTEGER NOT NULL,
    PRIMARY KEY (idPessoa, idListaExercicio),
    FOREIGN KEY (idListaExercicio) REFERENCES tbListaExercicio(idListaExercicio) ON UPDATE CASCADE,
    FOREIGN KEY (idPessoa) REFERENCES tbPessoa(idPessoa) ON UPDATE CASCADE
);