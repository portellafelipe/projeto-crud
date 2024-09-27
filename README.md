Seu código do banco.
CREATE TABLE estoque (
    id_estoque INTEGER AUTO_INCREMENT,
    produto VARCHAR(255), 
    quantidade INTEGER,
    dt_validade DATE,
    ID_Pessoa INTEGER,

    PRIMARY KEY(id_estoque),
    FOREIGN KEY(ID_Pessoa) REFERENCES login(ID_Pessoa)
)
 CREATE TABLE usuario (
   ID_Pessoa INTEGER AUTO_INCREMENT,
   usuario VARCHAR(50),
   email VARCHAR(11),
   senha VARCHAR(15),
   PRIMARY KEY (ID_Pessoa));
