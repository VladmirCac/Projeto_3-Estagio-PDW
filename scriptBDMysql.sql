create database estagio3_pdw;

use estagio3_pdw;

create table estagio3_pdw.usuario(
	codigoUsuario int not null auto_increment,
    nomeUsuario varchar(100) not null,
    loginUsuario varchar(30) not null unique,
    senhaUsuario varchar(30) not null,
    primary key (codigoUsuario)
    );
  
create table estagio3_pdw.EDITORA(
	codigoEditora int not null auto_increment,
    nomeEditora varchar(100) not null unique,
    primary key (codigoEditora)
    );

 alter table estagio3_pdw.EDITORA modify nomeEditora varchar(300) not null unique; 
    
create table estagio3_pdw.ASSUNTO(
	codigoAssunto int not null auto_increment,
    nomeAssunto varchar(50) not null unique,
    primary key (codigoAssunto)
    );


create table estagio3_pdw.autor(
	codigoAutor int not null auto_increment,
    nomeAutor varchar(300) not null unique,
    primary key (codigoAutor)
    );
    
create table estagio3_pdw.LIVRO(
	codigoLivro int not null auto_increment,
    codigoAutor int not null,
    codigoEditora int not null,
    codigoAssunto int not null,
    tituloLivro varchar(400) not null,
    isbn char(13),
    idiomaLivro varchar(35),
    condicaoLivro char(5) not null,
    anoLivro char(4) not null,
    edicaoLivro varchar(5),
    precoLivro decimal(7,2) not null,
    paginasLivro varchar(5),
    acabamentoLivro varchar(70),
    dimensaoLivro varchar(225),
    colecaoLivro varchar(150),
    traducaoLivro varchar(230),
    ilustracaoLivro varchar(100),
    palavraChaveLivro varchar(500),
    sinopseLivro text,
    primary key (codigoLivro),
    foreign key (codigoEditora) references editora(codigoEditora),
    foreign key (codigoAssunto) references assunto(codigoAssunto),
    foreign key (codigoAutor) references autor(codigoAutor)
    );
    
create table estagio3_pdw.LIVRO_DESCRITO(
	codigoLivroDescrito int not null unique auto_increment,
    codigoLivro int not null,
    subcodigoLivro varchar(2) not null,
    qtdLivro smallint not null,
    textoLivroDescrito varchar(500),
    precoLivroDescrito decimal(7,2) not null,
    obsLivroDescrito varchar(300),
    primary key (codigoLivro, subcodigoLivro),
    foreign key (codigoLivro) references livro(codigoLivro)
    );   
    
create table estagio3_pdw.CATEGORIA_DESCRICAO(
	codigoCategoriaDescricao int not null auto_increment,
    nomeCategoriaDescricao varchar(30),
    statusCategoriaDescricao bit not null default 1,
    primary key (codigoCategoriaDescricao)
    );
    
create table DESCRICAO(
	codigoDescricao int not null auto_increment,
    codigoCategoriaDescricao int not null,
    nomeDescricao varchar(100) not null,
    reducaoPreco decimal(3,2),
    statusDescricao bit not null default 1,
    primary key (codigoDescricao),
    foreign key (codigoCategoriaDescricao) references categoria_descricao(codigoCategoriaDescricao)
    );
    
create table estagio3_pdw.DESCRICAO_LIVRO_DESCRITO(
	codigoDescricao int not null,
    codigoLivroDescrito int not null,
    primary key (codigoDescricao , codigoLivroDescrito),
    foreign key (codigoDescricao) references descricao(codigoDescricao),
	foreign key (codigoLivroDescrito) references livro_descrito(codigoLivroDescrito)
    );
    
