CREATE DATABASE universus_beta;
USE sosialt_nettverk;

CREATE TABLE user (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   username VARCHAR(50),
   password VARCHAR(50)
);
 
CREATE TABLE folk_du_har_vert_med(
   user_1_id INTEGERz,
   user_2_id INTEGER
);

CREATE TABLE profile (
    user_id INTEGER UNSIGNED,
    navn VARCHAR(255),
    tlf INTEGER(8),
    universitet INTEGER UNSIGNED,
    alder INTEGER (120),
    kjoenn INTEGER, 
    fagomraade int
);

CREATE TABLE gruppe_users (
   user_id INTEGER UNSIGNED, 
   gruppe_id INTEGER UNSIGNED
);

CREATE TABLE grupper (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   navn varchar(50),
   beskrivelse varchar(255),
   interesser INTEGER,
   universitet INTEGER UNSIGNED
);

CREATE TABLE aktiviteter_grupper (
   gruppe_id INTEGER UNSIGNED,
   aktivitet_id INTEGER UNSIGNED
);

CREATE TABLE interesser (
   id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   navn varchar(100),
   beskrivelse text
);

CREATE TABLE interesser_user (
   user_id INTEGER UNSIGNED,
   interesser_id INTEGER
);

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

CREATE TABLE aktivitet_users (
   aktivitet_id INTEGER UNSIGNED,
   user_id INTEGER UNSIGNED
);
