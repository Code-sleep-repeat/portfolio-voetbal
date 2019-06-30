<?php
include "lib/connectdb.php";

$id = empty($_GET['id']) ? null : $_GET['id'];
$sql = 'SELECT * FROM telefoons WHERE id = :id';

$params = array(
    ":id" => $id
);

$sth = $db->prepare($sql);
$sth->execute($params);
$item = $sth->fetch(PDO::FETCH_ASSOC);