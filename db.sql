CREATE DATABASE PEMS;

CREATE TABLE
    User(
        id INT PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(70) NOT NULL,
        username VARCHAR(70) NOT NULL,
        password VARCHAR(40) NOT NULL,
        -- password length must be greater than 8
        CHECK(length(password) >= 8)
    );

ALTER TABLE User MODIFY email VARCHAR(70) NOT NULL UNIQUE;

-- Expense table

CREATE TABLE
    Expense(
        eid INT PRIMARY KEY AUTO_INCREMENT,
        uid INT NOT NULL,
        name VARCHAR(50) NOT NULL,
        amount INT NOT NULL,
        date DATE NOT NULL DEFAULT CURRENT_TIME,
        FOREIGN KEY (uid) REFERENCES User(id)
    );

ALTER TABLE Expense
ADD
    month INT NOT NULL DEFAULT MONTH(CURRENT_TIME);

ALTER TABLE Expense
ADD
    year INT NOT NULL DEFAULT YEAR(CURRENT_TIME);

ALTER TABLE Expense
ADD
    day INT NOT NULL DEFAULT DAY(CURRENT_TIME);

ALTER TABLE Expense
ADD
    week INT NOT NULL DEFAULT WEEK(CURRENT_TIME);

ALTER TABLE Expense
ADD
    dayOfWeek INT NOT NULL DEFAULT DAYOFWEEK(CURRENT_TIME);

--- Remainder table

CREATE TABLE
    Remainder(
        rid INT PRIMARY KEY AUTO_INCREMENT,
        uid INT NOT NULL,
        name VARCHAR(50) NOT NULL,
        amount INT NOT NULL,
        payingDate DATE NOT NULL,
        CHECK(payingDate > CURRENT_TIME),
        FOREIGN KEY (uid) REFERENCES User(id)
    );