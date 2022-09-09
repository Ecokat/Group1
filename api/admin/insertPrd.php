<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/group1/db_config.php';



$prd = json_decode(file_get_contents('php://input'));

$name1 = $prd->name;
$ctgid1 = $prd->ctgid;
$desc1 = $prd->desc;
$img1 = $prd->img;
$price1 = $prd->price;


$stmt = $conn->prepare("INSERT INTO Products (pname, pdesc, pimg, pprice) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $desc, $img, $price);
$name = $name1;
$desc = $desc1;
$img = $img1;
$price = $price1;
$stmt->execute();

$id1 = $conn->insert_id;

$stmt = $conn->prepare("INSERT INTO product_category (pid, ctgid) VALUES (?, ?)");
$stmt->bind_param("ii", $id, $ctgid);
$id = $id1;
$ctgid = $ctgid1;

$stmt->execute();


echo "Insert data to Products successfully !";
