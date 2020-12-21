create database brand character set utf8 collate utf8_general_ci;

create table product (
	id serial primary key,
	title varchar(255) not null,
	description text,
	price decimal (10, 2) not null,
	images varchar (255) not null,
	views int (11) default 0,
	categoryId int (11) unsigned not null
);

insert into product (title, images, price, description, categoryId) values
('shirt', '1.png', 100, ' акое-то описание товара надетое на этом кадре, майка', 1),
('blond', '2.png', 110, ' акое-то описание товара надетое на этом кадре, это блондинка', 2),
('tail', '3.png', 120, ' акое-то описание товара надетое на этом кадре, это чувак с хвостиком', 1),
('brunette', '4.png', 130, ' акое-то описание товара надетое на этом кадре, это брюнетка или шатенка, в общем х.з.', 2),
('peroxid', '5.png', 140, ' акое-то описание товара надетое на этом кадре, это пироксидна€', 2),
('hat', '6.png', 150, ' акое-то описание товара надетое на этом кадре, чувак в шл€пе', 1),
('pants', '7.png', 160, ' акое-то описание товара надетое на этом кадре, коротенькие штанишки', 1),
('shorts', '8.png', 170, ' акое-то описание товара надетое на этом кадре, шорты', 1),
('sad', '9.png', 180, ' акое-то описание товара надетое на этом кадре, грусный мальчик', 1),
('coat','10.png', 190, ' акое-то описание товара надетое на этом кадре, пальтишко', 1),
('beard', '11.png', 200, ' акое-то описание товара надетое на этом кадре, бородатый мужик', 1),
('bearded man', '12.png', 210, ' акое-то описание товара надетое на этом кадре, переодетый бородач', 1);

CREATE TABLE `users` (
  `id` serial primary key,
  `login` varchar(255) NOT null unique,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT null unique,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visited_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into users (login, password, email) values 
('User', 'qwerty', 'user@mail.com'),
('Nickname', 'ytrewq', 'nick@ya.ru');

insert into users (login, `password`, email) values 
('Us', 'qwery', 'usr@mail.com'),
('Nikname', 'yrewq', 'nck@ya.ru');

alter table users drop column hash;

drop table if exists reviews;
create table review (
	id serial primary key,
	idProduct bigint unsigned not null,
	idUser bigint unsigned not null, 
	body text,
	created_at datetime default current_timestamp,
	foreign key (idProduct) references product(id),
	foreign key (idUser) references users(id)
);

insert into review (idProduct, idUser, body) values
(1, 1, 'ниче так маичка'),
(1, 2, 'да фигн€, она стока не стоит'),
(2, 2, 'блондинка лопоушиста€');

drop table if exists orders;
create table orders (
	id serial primary key,
	idUser bigint unsigned not null,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    foreign key (idUser) references users(id)
);

alter table orders add column userName varchar (255), 
add column phone varchar (255), 
add column comment text;

drop table if exists orders_product;
create table orders_product (
	id SERIAL PRIMARY KEY,
  	orderId bigint unsigned not null,
  	productId bigint unsigned not null,
  	total INT UNSIGNED DEFAULT 0,
  	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	foreign key (productId) references product(id),
	foreign key (orderId) references orders(id)
);

alter table orders_product add column price decimal(10, 2) not null;

drop table if exists categories;
create table categories(
	id serial primary key,
	name varchar (255) not null
);

drop table if exists basket;
create table basket (
	id serial primary key,
	userId bigint unsigned not null,
	productId bigint unsigned not null,
	total INT UNSIGNED DEFAULT 1,
	foreign key (productId) references product(id),
	foreign key (userId) references users(id)
);



