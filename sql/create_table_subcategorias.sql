create table subcategorias(
    subcategoria_id int auto_increment,
    categoria_id int not null,
    subcategoria_name varchar(255) not null,
    PRIMARY KEY (subcategoria_id),
    FOREIGN KEY(categoria_id) REFERENCES categorias(categoria_id)
);
insert into subcategorias(categoria_id, subcategoria_name) values(1, "subcat11");
insert into subcategorias(categoria_id, subcategoria_name) values(1, "subcat12");
insert into subcategorias(categoria_id, subcategoria_name) values(1, "subcat13");

insert into subcategorias(categoria_id, subcategoria_name) values(2, "subcat21");
insert into subcategorias(categoria_id, subcategoria_name) values(2, "subcat22");