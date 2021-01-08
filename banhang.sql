drop database if exists banhang;
create database banhang;

use banhang;

CREATE TABLE categories (
id int(11) NOT NULL AUTO_INCREMENT,
icon varchar(255) default null,
name varchar(255) default null,
date_sold date NOT NULL ,
description text,
PRIMARY KEY (id));

INSERT INTO categories (id, name, description, icon,date_sold)
VALUES (1, 'Áo Nam', 'ÁO', 'A1.jpg','2020/01/02'),
       (2, 'Quần Nam', 'Quần', 'Q1.jpg','2020/01/04'),
       (3, 'Ví Nam', 'Ví', 'V1.jpg','2020/01/05'),
       (4, 'Đồng Hồ Nam', 'Đồng Hồ', 'D1.jpg','2020/01/06'),
       (5, 'Ba Lô Nam', 'Balo', 'B1.jpg','2020/01/06'),
       (6, 'Giày Nam', 'Giày','G1.jpg','2020/01/07');
       
CREATE TABLE products (
id int(11) NOT NULL AUTO_INCREMENT,
name varchar(255) default null,
price int(11) default null,
quantity int(11) default null,
category_id int(11) NOT NULL,
date_sold date NOT NULL ,
comments varchar(500) default null,
Images  varchar(255) default null,
PRIMARY KEY (id),
FOREIGN KEY (category_id) REFERENCES categories(id));

INSERT INTO products (id, name, price, quantity ,category_id,date_sold,comments ,Images) -- - 
VALUES ('1', 'Giày Trắng', 350, 30 ,1,'2020/01/07','số lượng có hạng','G1.jpg'),
    ('2', 'Giày Alexander', 300, 30 ,1,'2020/01/07','sành điệu','G2.jpg'),
    ('3', 'Giày Balenciaa', 500, 30 ,1,'2020/01/07','sành điệu','G3.jpg'),
    ('4', 'Giày Guccii', 400, 300 ,1,'2020/01/07','số lượng có hạng','G4.jpg'),
    ('5', 'Áo Khoác Da', 350, 30 ,2,'2020/01/07','số lượng có hạng','A1.jpg'),
    ('6', 'Áo Khoác Sành Điệu', 350, 30 ,2,'2020/01/07','sành điệu','A2.jpg'),
    ('7', 'Áo Khoác Phượt', 200, 30,2,'2020/01/07','sành điệu','A3.jpg'),
    ('8', 'Áo Khoác Bóng', 400, 30 ,2,'2020/01/07','số lượng có hạng','A4.jpg'),
    ('9', 'Ví Da Bò', 350, 300 ,3,'2020/01/07','hàng có sẵn','V1.jpg'),
    ('10', 'Ví Da Cá Sấu', 500, 30 ,3,'2020/01/07','số lượng có hạng','V2.jpg'),
    ('11', 'Ví Da Ngựa', 300, 30 ,3,'2020/01/07','số lượng có hạng','V3.jpg'),
    ('12', 'Ví Giả Da', 250, 30 ,3,'2020/01/07','sành điệu','V4.jpg'),
    ('13', 'Đồng hồ SONY', 500, 30 ,4,'2020/01/07','sành điệu','D1.jpg'),
    ('14', 'Đồng hồ TONY', 300, 30 ,4,'2020/01/07','bảo hành 1 năm','D2.jpg'),
    ('15', 'Đồng hồ MAMI', 500, 30 ,4,'2020/01/07','bảo hành 1 năm','D3.jpg'),
    ('16', 'Đồng hồ mạ vàng', 1050, 30 ,4,'2020/01/07','bảo hành 1 năm, 1 đổi 1','D4.jpg'),
    ('17', 'Quần jean', 150, 30 ,5,'2020/01/07','chất lượng cao','Q1.jpg'),
    ('18', 'Quần kaki', 150, 30 ,5,'2020/01/07','chất lượng cao','Q2.jpg'),
    ('19', 'Quần jogger', 300, 30 ,5,'2020/01/07','số lượng có hạng','Q3.jpg'),
    ('20', 'Quần tây', 500, 100 ,5,'2020/01/07','hàng có sẵn','Q4.jpg'),
    ('21', 'Balo thể thao', 400, 30 ,6,'2020/01/07','chất lượng cao','B1.jpg'),
    ('22', 'Balo học sinh', 200, 30 ,6,'2020/01/07','đa dạng mẫu mã','B2.jpg'),
    ('23', 'Balo phượt', 300, 30 ,6,'2020/01/07','hàng có sẵn','B3.png'),
    ('24', 'Balo sành điệu', 500, 30 ,6,'2020/01/07','số lượng có hạng','B4.jpg');
    
CREATE TABLE  customers(
    id int(11) auto_increment primary key not null,
    name varchar(255) not null,
    birthday date,
    email varchar(255),
    phone varchar(30) ,
    username varchar(100) not null,
    password varchar(100) not null);
    
INSERT INTO customers (id, name,birthday,email,phone, username, password)
VALUES ('1','Trần Công Dũng','2000/04/15','dung.tran@gmail.com','123456789','dung.tran','123456'),
       ('2','Nguyễn Thị Tiên','2000/04/15','tien.nguyen@gmail.com','123456789','tien.nguyen','012345'),
       ('3', 'Võ Thị Nhi', '2000/01/01','nhi.vo@gmail.com', '123456','nhi','123456')
       ('4', 'Đình', '2000/01/01','dinh.vo@gmail.com', '123456','thaydinh','123456');
                                                                                                  
CREATE TABLE  orders(
    id int(11) auto_increment primary key not null,
    cus_id int (11) not null,
    date_sold date not null,
    foreign key(cus_id) references CUSTOMERS(id));
    
INSERT INTO orders (id, cus_id, date_sold) -- --
VALUES ('1',1,'2020/01/03'),
       ('2',2,'2020/01/03'),
       ('3',1,'2020/01/04'),
       ('4',2,'2020/01/04'),
       ('5',1,'2020/01/05'),
       ('6',1,'2020/01/06'),
       ('7',2,'2020/01/07');
       
CREATE TABLE  orders_details(
    id int(11) auto_increment primary key not null,
    ord_id int (11) not null,
    prod_id int(11) not null,
    quantity int(30) not null,
    foreign key(ord_id) references orders(id),
    foreign key(prod_id) references products(id));

INSERT INTO orders_details (id, ord_id, prod_id, quantity) -- -
VALUES ('1',1,1,2),
       ('2',2,2,1),
       ('3',3,2,3),
       ('4',4,4,1),
       ('5',5,5,1),
       ('6',6,1,2),
       ('7',7,2,2);
       
CREATE TABLE admin1 (
id int(11) auto_increment primary key not null,
name varchar (11) ,
username varchar(11) not null,
password varchar(255) not null);

INSERT INTO admin1 (id, name, username, password)
VALUES  ('1',"long","longnguyen","123456");
