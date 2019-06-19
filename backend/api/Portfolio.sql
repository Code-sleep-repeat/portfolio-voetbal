
USE portfolio;
CREATE TABLE `login`
(
  `username` varchar(50),
  `password` varchar(20)
);

CREATE TABLE `leden`
(
  `voornaam` varchar(50),
  `tussenvoegsel` text,
  `achternaam` varchar(50),
  `lidnummer` varchar(5),
  `email` text,
  `soortlid` varchar(6),
  `geboortedatum` varchar(10),
  `postcode` text,
  `plaats` text,
  `telefoonnummer` varchar(10),
  `mobielnummer` varchar(10),
  `huisnummer` varchar(4)
  
);

CREATE TABLE `betaling`
(
  `jaar` varchar(4),
  `lidnummer` varchar(5),
  `email` text,
  `betaald` boolean,
  `tebetalen` text
);


