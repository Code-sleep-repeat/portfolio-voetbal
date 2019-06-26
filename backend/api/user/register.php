<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';

 
// instantiate user object
include_once '../objects/user.php';

//authentication 

 
$database = new Database();
$db = $database->getConnection();
 
$user = new user($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));
// echo print_r($data); 
// return;
// make sure data is not empty
if(
    !empty($data->username) &&
    !empty($data->password)

){
 //echo $_GET['voornaam'];
    

    //hash the password
    $newpass = password_hash($data->password, PASSWORD_DEFAULT);
    // echo $newpass;
    // return;
    
    // set user property values
    $user->username = $data->username;
    $user->password = $newpass;
    $user->id = random_int(0, 9999999);

    

    // create the user
    
    // try {
    //     $user->register();
    // } catch (Exception $e) {
    //     echo $e->getMessage();
    //     return;
    // }
    

    if($user->register()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "user was created."));
    }
 
    //if unable to create the user, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("error" => "Unable to create user."));
    }
}
 
//tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("error" => "Unable to create user. Data is incomplete."));
}
?>