<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/members.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$member = new Member($db);
 
// query products
$stmt = $member->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $members_arr=array();
    $members_arr["leden"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $member_instance=array(
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
 
        array_push($members_arr["leden"], $member_instance);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($members_arr);
}
 