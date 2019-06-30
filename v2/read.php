<?php
include "lib/connectdb.php";

$lidnummer = empty($_GET['lidnummer']) ? null : $_GET['lidnummer'];
$sql = 'SELECT * FROM leden WHERE lidnummer = :lidnummer';

$params = array(
    ":lidnummer" => $lidnummer
);

$sth = $db->prepare($sql);
$sth->execute($params);
$item = $sth->fetch(PDO::FETCH_ASSOC);