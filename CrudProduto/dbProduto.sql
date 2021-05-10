 drop database dbmonitoria;
create database dbmonitoria;
use dbmonitoria;


create table produto(
	id int primary key auto_increment,
    descricao varchar(55),
    qteEstoque int,
    preco float
);

create table usuario(
	id int primary key auto_increment,
    nome varchar(100),
    email varchar(100),
    senha varchar(50)
);

create table image(
	id int primary key auto_increment,
    nome varchar(200) not null,
    im mediumblob,
    tipo varchar(20),
    tamanho int(10) unsigned NOT NULL
);

INSERT INTO `dbmonitoria`.`usuario` (`nome`, `email`, `senha`) VALUES ('felipe', 'fe@fe.com', '123');
INSERT INTO `dbmonitoria`.`produto` (`descricao`, `qteEstoque`, `preco`) VALUES ('arroz', '1', '12.5');

select * from produto;
select * from image;




 
