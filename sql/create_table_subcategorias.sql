create table subcategorias(
    subcategoria_id int auto_increment,
    categoria_id int not null,
    subcategoria_name varchar(255) not null,
    PRIMARY KEY (subcategoria_id),
    FOREIGN KEY(categoria_id) REFERENCES categorias(categoria_id)
);