<?php
class Member{
 
    // database connection and table name
    private $conn;
    private $table_name = "leden";
 
    // object properties
    public $voornaam;
    public $tussenvoegsel;
    public $achternaam;
    public $lidnummer;
    public $email;
    public $soortlid;
    public $geboortedatum;
    public $postcode;
    public $plaats;
    public $telefoonnummer;
    public $mobielnummer;
    public $huisnummer;

// read products
function read(){
 
    // select all query
    $query = "SELECT * FROM " . $this->table_name;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
// create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO " . $this->table_name . "
            SET
            voornaam=:voornaam, 
            tussenvoegsel=:tussenvoegsel, 
            achternaam=:achternaam, 
            lidnummer=:lidnummer, 
            email=:email, 
            soortlid=:soortlid,
            geboortedatum=:geboortedatum,
            postcode=:postcode,
            plaats=:plaats,
            telefoonnummer=:telefoonnummer,
            mobielnummer=:mobielnummer,
            huisnummer=:huisnummer";

    //echo $query;
    //die;
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->voornaam=htmlspecialchars(strip_tags($this->voornaam));
    $this->tussenvoegsel=htmlspecialchars(strip_tags($this->tussenvoegsel));
    $this->achternaam=htmlspecialchars(strip_tags($this->achternaam));
    $this->lidnummer=htmlspecialchars(strip_tags($this->lidnummer));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->soortlid=htmlspecialchars(strip_tags($this->soortlid));
    $this->geboortedatum=htmlspecialchars(strip_tags($this->geboortedatum));
    $this->postcode=htmlspecialchars(strip_tags($this->postcode));
    $this->plaats=htmlspecialchars(strip_tags($this->plaats));
    $this->telefoonnummer=htmlspecialchars(strip_tags($this->telefoonnummer));
    $this->mobielnummer=htmlspecialchars(strip_tags($this->mobielnummer));
    $this->huisnummer=htmlspecialchars(strip_tags($this->huisnummer));
    

 
    // bind values
    $stmt->bindParam(":voornaam", $this->voornaam);
    $stmt->bindParam(":tussenvoegsel", $this->tussenvoegsel);
    $stmt->bindParam(":achternaam", $this->achternaam);
    $stmt->bindParam(":lidnummer", $this->lidnummer);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":soortlid", $this->soortlid);
    $stmt->bindParam(":geboortedatum", $this->geboortedatum);
    $stmt->bindParam(":postcode", $this->postcode);
    $stmt->bindParam(":plaats", $this->plaats);
    $stmt->bindParam(":telefoonnummer", $this->telefoonnummer);
    $stmt->bindParam(":mobielnummer", $this->mobielnummer);
    $stmt->bindParam(":huisnummer", $this->huisnummer);
 
    // execute query
    //if($stmt->execute()){
    //    return true;
    //}

    try {
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo $e->getMessage() . "<br>";
        echo print_r($this->conn->errorInfo());
        die; //return true;
    }
 
    //return false;
     
}
// used when filling up the update product form
function readOne(){
 
    // query to read single record
    $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                lidnummer = ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->lidnummer);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->voornaam = $row['voornaam'];
    $this->tussenvoegsel = $row['tussenvoegsel'];
    $this->achternaam = $row['achternaam'];
    $this->lidnummer = $row['lidnummer'];
    $this->email = $row['email'];
    $this->soortlid = $row['soortlid'];
    $this->geboortedatum = $row['geboortedatum'];
    $this->postcode = $row['postcode'];
    $this->plaats = $row['plaats'];
    $this->telefoonnummer = $row['telefoonnummer'];
    $this->mobielnummer = $row['mobielnummer'];
    $this->huisnummer = $row['huisnummer'];
}
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
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
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->voornaam=htmlspecialchars(strip_tags($this->voornaam));
    $this->tussenvoegsel=htmlspecialchars(strip_tags($this->tussenvoegsel));
    $this->achternaam=htmlspecialchars(strip_tags($this->achternaam));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->soortlid=htmlspecialchars(strip_tags($this->soortlid));
    $this->geboortedatum=htmlspecialchars(strip_tags($this->geboortedatum));
    $this->postcode=htmlspecialchars(strip_tags($this->postcode));
    $this->plaats=htmlspecialchars(strip_tags($this->plaats));
    $this->telefoonnummer=htmlspecialchars(strip_tags($this->telefoonnummer));
    $this->mobielnummer=htmlspecialchars(strip_tags($this->mobielnummer));
    $this->huisnummer=htmlspecialchars(strip_tags($this->huisnummer));
    

 
    // bind values
    $stmt->bindParam(":voornaam", $this->voornaam);
    $stmt->bindParam(":tussenvoegsel", $this->tussenvoegsel);
    $stmt->bindParam(":achternaam", $this->achternaam);
    $stmt->bindParam(":lidnummer", $this->lidnummer);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":soortlid", $this->soortlid);
    $stmt->bindParam(":geboortedatum", $this->geboortedatum);
    $stmt->bindParam(":postcode", $this->postcode);
    $stmt->bindParam(":plaats", $this->plaats);
    $stmt->bindParam(":telefoonnummer", $this->telefoonnummer);
    $stmt->bindParam(":mobielnummer", $this->mobielnummer);
    $stmt->bindParam(":huisnummer", $this->huisnummer);
 
    // execute the query
    try {
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo $e->getMessage() . "<br>";
        echo print_r($this->conn->errorInfo());
        die; //return true;
    }
}
// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE lidnummer = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->lidnummer=htmlspecialchars(strip_tags($this->lidnummer));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->lidnummer);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
function search($keywords){
 
    // select all query
    $query = "SELECT
               *
            FROM
                " . $this->table_name . " 
            WHERE
                voornaam LIKE ? OR achternaam LIKE ? OR email LIKE ? OR lidnummmer LIKE ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
    $stmt->bindParam(4, $keywords);
 
    // execute query
    try {
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo $e->getMessage() . "<br>";
        echo print_r($this->conn->errorInfo());
        die; //return true;
    }
 
    return $stmt;
}
/////////////////////////////////////////////////////////////////////
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}