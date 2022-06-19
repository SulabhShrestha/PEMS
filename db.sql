CREATE DATABASE PEMS;

CREATE TABLE User(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(70) NOT NULL,
    username VARCHAR(70) NOT NULL,
    password VARCHAR(40) NOT NULL,
    -- password length must be greater than 8
    CHECK(length(password) >= 8)
);

ALTER TABLE User
MODIFY email VARCHAR(70) NOT NULL UNIQUE;

-- Expense table
CREATE TABLE Expense(
    eid INT PRIMARY KEY AUTO_INCREMENT,
    uid INT NOT NULL, 
    name VARCHAR(50) NOT NULL,
    amount INT NOT NULL, 
    date DATE NOT NULL DEFAULT CURRENT_TIME, 
    FOREIGN KEY (uid) REFERENCES User(id)
);
