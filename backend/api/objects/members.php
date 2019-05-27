<?php
class Member{
 
    // database connection and table name
    private $conn;
    private $table_name = "leden";
 
    // object properties
    public $id;
    public $voornaam;
    public $tussenvoegsel;
    public $achternaam;
    public $lidnummer;
    public $details;

// read products
function read(){
 
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
// create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                voornaam=:voornaam, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam, lidnummer=:lidnummer";

    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->voornaam=htmlspecialchars(strip_tags($this->voornaam));
    $this->tussenvoegsel=htmlspecialchars(strip_tags($this->tussenvoegsel));
    $this->achternaam=htmlspecialchars(strip_tags($this->achternaam));
    $this->lidnummer=htmlspecialchars(strip_tags($this->lidnummer));

 
    // bind values
    $stmt->bindParam(":voornaam", $this->voornaam);
    $stmt->bindParam(":tussenvoegsel", $this->tussenvoegsel);
    $stmt->bindParam(":achternaam", $this->achternaam);
    $stmt->bindParam(":lidnummer", $this->lidnummer);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
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