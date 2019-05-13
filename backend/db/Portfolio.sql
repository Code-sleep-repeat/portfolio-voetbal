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
  `details` text
);

CREATE TABLE `betaling`
(
  `jaar` varchar(4),
  `lidnummer` int,
  `email` text,
  `betaald` boolean,
  `tebetalen` text
);

CREATE TABLE `details`
(
  `lidnummer` varchar(5),
  `email` text,
  `postcode` text,
  `huisnummer` varchar(4),
  `plaats` text,
  `mobielnummer` varchar(10),
  `telefoonnummer` varchar(10),
  `soortlid` varchar(6),
  `geboortedatum` datetime
);

