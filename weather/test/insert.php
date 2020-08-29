<?php

$sql = "CREATE TABLE MEMBER(
    ID VARCHAR(20) PRIMARY KEY,
    Password VARCHAR(128) NOT NULL,
    Name VARCHAR(12) NOT NULL,
    Email VARCHAR(30) NOT NULL,
    Phone VARCHAR(10) NOT NULL,
    RegDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Birth DATE,
    Gender ENUM('M', 'F', 'N'),
    Address VARCHAR(100),
    Position ENUM('S', 'A', 'C') NOT NULL
    );";
$result = $conn->query($sql);

$sql = "CREATE TABLE PRODUCT(
    ID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) NOT NULL,
    State ENUM('in_stock', 'out_of_stock', 'removed_from_shelves'),
    Stock INT(7) UNSIGNED NOT NULL,
    Price INT(10) UNSIGNED NOT NULL,
    Img VARCHAR(100) NOT NULL,
    Info VARCHAR(300),
    DID INT(7) UNSIGNED,
    CategoryID INT(7) UNSIGNED NOT NULL
    );";   
    $result = $conn->query($sql);

$sql = "INSERT INTO MEMBER(ID, Password, Name, Email, Phone, Birth, Gender, Position, Address)
VALUE('admin', '21232f297a57a5a743894a0e4a801fc3', '管理員', 'admin@gmail.com', '0912345678', '1911-10-10', 'M', 'A','台中市西屯區市政北二路二段238號');";   
    $result = $conn->query($sql);  

$sql = "CREATE TABLE CATEGORY(
    ID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(10) NOT NULL UNIQUE);";   
    $result = $conn->query($sql);  

$sql = "INSERT INTO CATEGORY(Name) Value('綠茶');";   
    $result = $conn->query($sql);      

$sql = "alter table tablename auto_increment = 1;";   
    $result = $conn->query($sql);       
?>