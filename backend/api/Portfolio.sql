
DROP TABLE IF EXISTS login;
CREATE TABLE users
(
  username varchar(50),
  password text,
  id int,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS leden;
CREATE TABLE leden
(
  voornaam varchar(50),
  tussenvoegsel text,
  achternaam varchar(50),
  lidnummer int,
  email text,
  soortlid varchar(6),
  geboortedatum varchar(10),
  postcode text,
  plaats text,
  telefoonnummer varchar(10),
  mobielnummer varchar(10),
  huisnummer varchar(4),
  betaald boolean,
  PRIMARY KEY (lidnummer)
  
);
DROP TABLE IF EXISTS betaling;
CREATE TABLE betaling
(
  jaar varchar(4),
  lidnummer varchar(5),
  email text,
  betaald boolean,
  tebetalen text
);


