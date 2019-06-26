<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/members.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$member = new Member($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 

 
// set product property values
$member->voornaam = $data->voornaam;
$member->tussenvoegsel = $data->tussenvoegsel;
$member->achternaam = $data->achternaam;
$member->lidnummer = $data->lidnummer;
$member->email = $data->email;
$member->soortlid = $data->soortlid;
$member->geboortedatum = $data->geboortedatum;
$member->postcode = $data->postcode;
$member->plaats = $data->plaats;
$member->telefoonnummer = $data->telefoonnummer;
$member->mobielnummer = $data->mobielnummer;
$member->huisnummer = $data->huisnummer;

//update the member
$member->update();

// update the product
// if($member->update()){
 
//     // set response code - 200 ok
//     http_response_code(200);
 
//     // tell the user
//     echo json_encode(array("message" => "Product was updated."));
// }
 
// // if unable to update the product, tell the user
// else{
 
//     // set response code - 503 service unavailable
//     http_response_code(503);
 
//     // tell the user
//     echo json_encode(array("message" => "Unable to update product."));
// }
?>