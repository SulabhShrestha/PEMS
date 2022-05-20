CREATE DATABASE PEMS;

CREATE TABLE User(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(70) NOT NULL,
    username VARCHAR(70) NOT NULL,
    password VARCHAR(40) NOT NULL,
    -- password length must be greater than 8
    CHECK(length(password) >= 8)
);