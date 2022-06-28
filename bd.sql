create database "testephp"

use "testephp"

create table beneficios(
    cod int auto_increment primary key,
    nome varchar(100) not null,
    operadora varchar(100) not null,
    tipo_beneficio varchar(100) not null,
    vencto_contrato date not null
)