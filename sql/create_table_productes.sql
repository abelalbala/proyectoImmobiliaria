CREATE OR REPLACE table productos(
    producto_id int auto_increment,
    user_id int not null,
    producto_name varchar(255) not null,
    producto_precio int not null,
    producto_precio_descuento int DEFAULT 0,
    categoria_id int,
    subcategoria_id int,
    producto_descripcion varchar(2000),
    producto_imgs varchar(255),
    lat varchar(255) not null,
    lng varchar(255) not null,
    direccion varchar(255),
    PRIMARY KEY (producto_id),
    FOREIGN KEY(user_id) REFERENCES users(user_id),
    FOREIGN KEY(categoria_id) REFERENCES categorias(categoria_id),
    FOREIGN KEY(subcategoria_id) REFERENCES subcategorias(subcategoria_id)
);

