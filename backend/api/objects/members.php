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
            VALUES(
                :voornaam, 
                :tussenvoegsel, 
                :achternaam, 
                :lidnummer, 
                :email, 
                :soortlid,
                :geboortedatum,
                :postcode,
                :plaats,
                :telefoonnummer,
                :mobielnummer,
                :huisnummer)";

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
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->voornaam = $row['voornaam'];
    $this->tussenvoegsel = $row['tussenvoegsel'];
    $this->lidnummer = $row['lidnummer'];
}
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                voornam = :voornaam,
                tussenvoegsel = :tussenvoegsel,
                lidnummer = :lidnummer
                
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->voornaam));
    $this->tussenvoegsel=htmlspecialchars(strip_tags($this->tussenvoegsel));
    $this->achternaam=htmlspecialchars(strip_tags($this->achternaam));
    $this->lidnummer=htmlspecialchars(strip_tags($this->lidnummer));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind new values
    $stmt->bindParam(':voornaam', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
function search($keywords){
 
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ?
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
/////////////////////////////////////////////////////////////////////
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}