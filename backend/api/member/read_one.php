<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/members.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare member object
$member = new Member($db);
 
// set ID property of record to read
$member->lidnummer = isset($_GET['lidnummer']) ? $_GET['lidnummer'] : die();
 
// read the details of member to be edited
$member->readOne();
 
if($member->voornaam!=null){
    // create array
    $member_arr = array(
        "voornaam" =>  $member->voornaam,
        "tussenvoegsel" => $member->tussenvoegsel,
        "achternaam" => $member->achternaam,
        "lidnummer" => $member->lidnummer,
        "email" => $member->email,
        "soortlid" => $member->soortlid,
        "geboortedatum" => $member->geboortedatum,
        "postcode" => $member->postcode,
        "plaats" => $member->plaats,
        "telefoonnummer" => $member->telefoonnummer,
        "mobielnummer" => $member->mobielnummer,
        "huisnummer" => $member->huisnummer
 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($member_arr);
}
 
// else{
//     // set response code - 404 Not found
//     http_response_code(404);
 
//     // tell the user member does not exist
//     echo json_encode(array("message" => "member does not exist."));
// }
?>