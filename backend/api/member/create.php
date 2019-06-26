<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';

 
// instantiate member object
include_once '../objects/members.php';

//authentication 

 
$database = new Database();
$db = $database->getConnection();
 
$member = new Member($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));
//echo print_r($data); 
//return;
// make sure data is not empty
if(
    !empty($data->voornaam) &&
    !empty($data->tussenvoegsel) &&
    !empty($data->achternaam) &&
    !empty($data->lidnummer) &&
    !empty($data->email) && 
    !empty($data->soortlid) &&
    !empty($data->geboortedatum) &&
    !empty($data->postcode) &&
    !empty($data->plaats) && 
    !empty($data->huisnummer) 
){
 //echo $_GET['voornaam'];
    // set member property values
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

    
}
    // create the member
$member->create();  
//     try {
//         $member->create();
//     } catch (Exception $e) {
//         echo $e->getMessage();
//         return;
//     }
    
// }
//     if($member->create()){
 
//         // set response code - 201 created
//         http_response_code(201);
 
//         // tell the user
//         echo json_encode(array("message" => "member was created."));
//     }
 
//     //if unable to create the member, tell the user
//     else{
 
//         // set response code - 503 service unavailable
//         http_response_code(503);
 
//         // tell the user
//         echo json_encode(array("error" => "Unable to create member."));
//     }
// }
 
//tell the user data is incomplete
// else{
 
//     // set response code - 400 bad request
//     http_response_code(503);
 
//     // tell the user
//     echo json_encode(array("error" => "Unable to create member. Data is incomplete."));
// }
?>