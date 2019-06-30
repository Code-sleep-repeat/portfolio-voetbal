<?php

include "lib/connectdb.php";


$lidnummer = empty($_GET['lidnummer']) ? "onbekend" : $_GET['lidnummer']; 
$query = "DELETE FROM leden WHERE lidnummer = $lidnummer";

$db->exec($query);
header('location: index.php');