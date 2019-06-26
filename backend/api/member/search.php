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
 
// get keywords
$keywords=isset($_GET["q"]) ? $_GET["q"] : "";
 
// query products
$stmt = $member->search($keywords);

 
// check if more than 0 record found
if(1){
 
    // products array
    $member_instance=array();
    $member_instance["leden"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $member_instance=array(
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
 
        array_push($members_arr["leden"], $member_instance);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data
    echo json_encode($members_arr);
}
 
// else{
//     // set response code - 404 Not found
//     http_response_code(404);
 
//     // tell the user no products found
//     echo json_encode(
//         array("message" => "No members found.")
//     );
// }
?>