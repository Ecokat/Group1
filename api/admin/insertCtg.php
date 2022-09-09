<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/group1/db_config.php';



$ctg = json_decode(file_get_contents('php://input'));

$name1 = $ctg->name;
$desc1 = $ctg->desc;


$stmt = $conn->prepare("INSERT INTO Categories (ctgname, ctgdesc) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $desc);
$name = $name1;
$desc = $desc1;
$stmt->execute();




echo "Insert data to Categories successfully !";
