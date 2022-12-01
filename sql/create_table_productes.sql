create table productos(
    producto_id int auto_increment,
    user_id int not null,
    producto_name varchar(255) not null,
    producto_precio int not null,
    producto_precio_descuento int,
    producto_descripcion varchar(2000)
    PRIMARY KEY (producto_id),
    FOREIGN KEY(user_id) REFERENCES user(user_id)
);