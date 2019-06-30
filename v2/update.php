<?php
include "lib/connectdb.php";

$model = empty($_POST['model']) ? "onbekend" : $_POST['model'];
$id = empty($_POST['id']) ? "onbekend" : $_POST['id'];
$fabrikant = empty($_POST['fabrikant']) ? "onbekend" : $_POST['fabrikant'];
$geheugen = empty($_POST['geheugen']) ? "onbekend" : $_POST['geheugen'];
$prijs = empty($_POST['prijs']) ? "onbekend" : $_POST['prijs'];
$sql= 'UPDATE telefoons SET model = :model, fabrikant = :fabrikant, geheugen = :geheugen, prijs = :prijs WHERE id = :id';

$params = array(
    ":model" => $model,
    ":fabrikant" => $fabrikant,
    ":geheugen" => $geheugen,
    ":prijs" => $prijs,
    ":id" => $id,
);


$sth = $db->prepare($sql);
$sth->execute($params);
header('location: index.php');