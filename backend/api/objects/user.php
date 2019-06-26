<?php
class User{
    private $conn;
    public $password;
    public $serverHash;
    private $table_name = 'users';
    public $id;
    public $username;

function register(){

    $query = "INSERT INTO " . $this->table_name . "
        VALUES(
            :username, 
            :password, 
            :id)";
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->id=htmlspecialchars(strip_tags($this->id));
            
        
         
    // bind values
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":id", $this->id);
         
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
function login(){
    $stmt = $conn->prepare('select password, username from users where password=' . $this->password . 'and username=' . $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->serverHash = $row['password'];
    return $stmt;

    }
    /////////////////////////////////////////////////////////////////////
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}