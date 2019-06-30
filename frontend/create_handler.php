<?php
$voornaam = empty($_POST['voornaam']) ? "onbekend" : $_POST['voornaam'];
$tussenvoegsel = empty($_POST['tussenvoegsel']) ? "onbekend" : $_POST['tussenvoegsel'];
$achternaam = empty($_POST['achternaam']) ? "onbekend" : $_POST['achternaam'];
$lidnummer = empty($_POST['lidnummer']) ? "onbekend" : $_POST['lidnummer'];
$email = empty($_POST['email']) ? "onbekend" : $_POST['email'];
$soortlid = empty($_POST['soortlid']) ? "onbekend" : $_POST['soortlid'];
$geboortedatum = empty($_POST['geboortedatum']) ? "onbekend" : $_POST['geboortedatum'];
$postcode = empty($_POST['postcode']) ? "onbekend" : $_POST['postcode'];
$plaats = empty($_POST['plaats']) ? "onbekend" : $_POST['plaats'];
$telefoonnummer = empty($_POST['telefoonnummer']) ? "onbekend" : $_POST['telefoonnummer'];
$mobielnummer = empty($_POST['mobielnummer']) ? "onbekend" : $_POST['mobielnummer'];
$huisnummer = empty($_POST['huisnummer']) ? "onbekend" : $_POST['huisnummer'];

$data = array(
  "voornaam" => $voornaam,
  "tussenvoegsel" => $tussenvoegsel,
  "achternaam" => $achternaam,
  "lidnummer" => $lidnummer,
  "email" => $email,
  "soortlid" => $soortlid,
  "geboortedatum" => $geboortedatum,
  "postcode" => $postcode,
  "plaats" => $plaats,
  "telefoonnummer" => $telefoonnummer,
  "mobielnummer" => $mobielnummer,
  "huisnummer" => $huisnummer
);

// $options = array(
//   'http' => array(
//     'method'  => 'POST',
//     'content' => json_encode( $data ),
//     'header'=>  "Content-Type: application/json\r\n" .
//                 "Accept: application/json\r\n"
//     )
// );
//print_r($options);
$url = "http://localhost/portfolio-voetbal/backend/api/member/create.php";
$context  = stream_context_create( $data );
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );


 ?>
