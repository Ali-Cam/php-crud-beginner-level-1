create database products;

use products;

CREATE TABLE inventory
(
   id INT AUTO_INCREMENT PRIMARY KEY,
   product VARCHAR(50) UNIQUE NOT null,
   descriptions VARCHAR(100) NOT null,
   price DECIMAL(18,2) NOT null
);