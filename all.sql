--create database:
CREATE DATABASE sosialt_nettverk;
USE sosialt_nettverk;
 
--user:
CREATE TABLE User (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   username VARCHAR(50),
   password VARCHAR(50)
);
 
--folk du har vært med:
CREATE TABLE Folk_du_har_vert_med(
   user_1_id INTEGER
   user_2_id INTEGER
);

-- profile
CREATE TABLE Profile (
    user_id INTEGER UNSIGNED,
    name VARCHAR(255),
    tlf INTEGER(8),
    universitet INTEGER UNSIGNED,
    alder INTEGER (120),
    kjønn INTEGER, 
    Fagområde VARCHAR(255),
   --  interesser INTEGER UNSIGNED // Tror ikke at me trenge den her siden den e kobla opp te user_id
);
-- Kem e i hvilken gruppe
CREATE TABLE Gruppe_users (
   user_id INTEGER UNSIGNED, 
   gruppe_id INTEGER UNSIGNED
);

 -- grupper
CREATE TABLE Grupper (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   name varchar(50),
   aktivitet varchar(255),
   interesser INTEGER,
   universitet INTEGER UNSIGNED
);

-- Forbindelse for flere aktiviteter i ein gruppe
CREATE TABLE Aktiviteter_Grupper (
   gruppe_id INTEGER UNSIGNED,
   aktivitet_id INTEGER UNSIGNED
);

--  interesser
CREATE TABLE Interesser (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   navn varchar(100),
   beskrivelse varchar(255)
);

-- interesser koblet te user id
CREATE TABLE Interesser_user (
   user_id INTEGER UNSIGNED,
   interesser_id INTEGER
);
-- aktiviteter
CREATE TABLE Aktiviteter (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   navn VARCHAR(255),
   public INTEGER, -- boolean fins desverre ikkje, så 0 betyr sann og 1 betyr usann
   sted varchar(255),
   tidspunkt datetime,
   sluttTispunkt datetime DEFAULT NULL,
   maxFolk INTEGER DEFAULT NULL,
   gruppe_id INTEGER DEFAULT NULL
);
