create table users(
    user_id int auto_increment,
    user_name varchar(255) not null,
    user_email varchar(255) not null unique,
    user_password varchar(10000) not null,
    PRIMARY KEY (user_id)
);