<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';


$prd = json_decode(file_get_contents('php://input'));

$id = $prd->pid;
$name = $prd->pname;
$desc = $prd->pdesc;
$img = $prd->pimg;
$price= $prd->pprice;

$sql = "UPDATE Products SET pname = '" . $name . "',  pdesc = '" . $desc . "',  pimg = '" . $img . "', pprice = '" . $price . "' 
        WHERE pid = '" . $id . "'";
$result = $conn->query($sql);

echo "Product No. " .$id. " updated successfully!";
