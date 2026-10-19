CREATE DATABASE IF NOT EXISTS moto_store CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE moto_store;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS users_items;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS products;

CREATE TABLE products (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    horsepower INT NOT NULL,
    category ENUM('supersport','naked','cross') NOT NULL,
    image VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO products (id, name, price, horsepower, category, image) VALUES
(1, 'HONDA CBR600RR', 11990.00, 121, 'supersport', 'img/HONDA_CBR600RR.jpg'),
(2, 'HONDA CBR650R', 9690.00, 95, 'supersport', 'img/HONDA_CBR650R.jpg'),
(3, 'HONDA CBR1000RR-R Fireblade', 25990.00, 217, 'supersport', 'img/HONDA_CBR1000RR-R_Fireblade.jpg'),
(4, 'HONDA CBR1000RR-R Fireblade SP', 30990.00, 217, 'supersport', 'img/HONDA_CBR1000RR-R_Fireblade_SP.jpg'),
(5, 'HONDA CB1000 Hornet', 10990.00, 152, 'naked', 'img/HONDA_CB1000_Hornet.jpg'),
(6, 'HONDA CB1000 Hornet SP', 12990.00, 157, 'naked', 'img/HONDA_CB1000_Hornet_SP.jpg'),
(7, 'HONDA CB650R', 9290.00, 95, 'naked', 'img/HONDA_CB650R.jpg'),
(8, 'HONDA CB750 Hornet', 8590.00, 92, 'naked', 'img/HONDA_CB750_Hornet.jpg'),
(9, 'HONDA CRF300L', 6590.00, 27, 'cross', 'img/HONDA_CRF300L.jpg'),
(10, 'HONDA CRF300 Rally', 7490.00, 27, 'cross', 'img/HONDA_CRF300_Rally.jpg'),
(11, 'HONDA CRF1100L Africa Twin', 15990.00, 102, 'cross', 'img/HONDA_CRF1100L_Africa_Twin.jpg'),
(12, 'HONDA CRF1100L Africa Twin Adventure Sports', 18990.00, 102, 'cross', 'img/HONDA_CRF1100L_Africa_Twin_Adventure_Sports.jpg');

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (id, name, email, password, contact, city, address, is_admin) VALUES
(1, 'Administrator', 'admin@mail.com', '$2y$12$tjc2fhv.uGHUDoVpN33Ym.hiZNtkPYywMqIP0HX2OnF5hoToHPYIu', '0000000000', 'Osijek', 'Admin adresa', 1);

CREATE TABLE users_items (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    status ENUM('Added to cart','Confirmed') NOT NULL DEFAULT 'Added to cart',
    PRIMARY KEY (id),
    KEY user_id (user_id),
    KEY item_id (item_id),
    CONSTRAINT users_items_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    CONSTRAINT users_items_ibfk_2 FOREIGN KEY (item_id) REFERENCES products (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
