--create database:
CREATE DATABASE universus_beta;
USE sosialt_nettverk;
 
--user:
CREATE TABLE user (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   username VARCHAR(50),
   password VARCHAR(50)
);
 
--folk du har vært med:
CREATE TABLE folk_du_har_vert_med(
   user_1_id INTEGER
   user_2_id INTEGER
);

-- profile
CREATE TABLE profile (
    user_id INTEGER UNSIGNED,
    navn VARCHAR(255),
    tlf INTEGER(8),
    universitet INTEGER UNSIGNED,
    alder INTEGER (120),
    kjoenn INTEGER, 
    fagomraade int
);
-- Kem e i hvilken gruppe
CREATE TABLE gruppe_users (
   user_id INTEGER UNSIGNED, 
   gruppe_id INTEGER UNSIGNED
);

 -- grupper
CREATE TABLE grupper (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   navn varchar(50),
   beskrivelse varchar(255),
   interesser INTEGER,
   universitet INTEGER UNSIGNED
);

-- Forbindelse for flere aktiviteter i ein gruppe
CREATE TABLE aktiviteter_grupper (
   gruppe_id INTEGER UNSIGNED,
   aktivitet_id INTEGER UNSIGNED
);

--  interesser
CREATE TABLE interesser (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   navn varchar(100),
   beskrivelse text
);

-- interesser koblet te user id
CREATE TABLE interesser_user (
   user_id INTEGER UNSIGNED,
   interesser_id INTEGER
);
-- aktiviteter
CREATE TABLE aktiviteter (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   navn VARCHAR(255),
   public INTEGER, -- boolean fins desverre ikkje, så 0 betyr sann og 1 betyr usann
   sted varchar(255),
   start_tidspunkt datetime DEFAULT NULL,
   slutt_tispunkt datetime DEFAULT NULL,
   max_folk INTEGER DEFAULT NULL,
   gruppe_id INTEGER DEFAULT NULL
);
-- kem som e med i ein aktivitet (akseptert invitasjonen)
CREATE TABLE aktivitet_users (
   aktivitet_id INTEGER UNSIGNED,
   user_id INTEGER UNSIGNED
);
