create table categorias(
    categoria_id int auto_increment,
    categoria_name varchar(255) not null,
    PRIMARY KEY (categoria_id)
);
insert into categorias(categoria_name) values("cat1");
insert into categorias(categoria_name) values("cat2");