<?php
include "lib/connectdb.php";

$voornaam = empty($_POST['voornaam']) ? "onbekend" : $_POST['voornaam'];
$tussenvoegsel = empty($_POST['tussenvoegsel']) ? "onbekend" : $_POST['tussenvoegsel'];
$achternaam = empty($_POST['achternaam']) ? "onbekend" : $_POST['achternaam'];

$email = empty($_POST['email']) ? "onbekend" : $_POST['email'];
$soortlid = empty($_POST['soortlid']) ? "onbekend" : $_POST['soortlid'];
$geboortedatum = empty($_POST['geboortedatum']) ? "onbekend" : $_POST['geboortedatum'];
$postcode = empty($_POST['postcode']) ? "onbekend" : $_POST['postcode'];
$plaats = empty($_POST['plaats']) ? "onbekend" : $_POST['plaats'];
$telefoonnummer = empty($_POST['telefoonnummer']) ? "onbekend" : $_POST['telefoonnummer'];
$mobielnummer = empty($_POST['mobielnummer']) ? "onbekend" : $_POST['mobielnummer'];
$huisnummer = empty($_POST['huisnummer']) ? "onbekend" : $_POST['huisnummer'];

//ID
$lidnummer = empty($_GET['lidnummer']) ? "onbekend" : $_GET['lidnummer'];

$query = "UPDATE leden
SET
voornaam=:voornaam, 
tussenvoegsel=:tussenvoegsel, 
achternaam=:achternaam,  
email=:email, 
soortlid=:soortlid,
geboortedatum=:geboortedatum,
postcode=:postcode,
plaats=:plaats,
telefoonnummer=:telefoonnummer,
mobielnummer=:mobielnummer,
huisnummer=:huisnummer

WHERE
lidnummer = :lidnummer";

$params = array(
    ":voornaam" => $voornaam,
    ":tussenvoegsel" => $tussenvoegsel,
    ":achternaam" => $achternaam,
    ":lidnummer" => $lidnummer,
    ":email" => $email,
    ":soortlid" => $soortlid,
    ":geboortedatum" => $geboortedatum,
    ":postcode" => $postcode,
    ":plaats" => $plaats,
    ":telefoonnummer" => $telefoonnummer,
    ":mobielnummer" => $mobielnummer,
    ":huisnummer" => $huisnummer
);


$sth = $db->prepare($query);
$sth->execute($params);
header('location: index.php');