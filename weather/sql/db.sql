CREATE TABLE CITY(
    citySit VARCHAR(20) PRIMARY KEY,
    cityName VARCHAR(20) NOT NULL
);
CREATE TABLE TODAY(
    wID int AUTO_INCREMENT PRIMARY KEY,
    citySit VARCHAR(20) ,
    uptime VARCHAR(50) DEFAULT NULL,
    temp FLOAT DEFAULT NULL,
    weather VARCHAR(50) DEFAULT NULL,
    FOREIGN KEY(citySit) REFERENCES CITY(citySit)
);