<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';


$prd = json_decode(file_get_contents('php://input'));

$id = $prd->ctgid;
$name = $prd->ctgname;
$desc = $prd->ctgdesc;


$sql = "UPDATE Categories SET ctgname = '" . $name . "',  ctgdesc = '" . $desc . "' 
        WHERE ctgid = '" . $id . "'";
$result = $conn->query($sql);

echo "Category No. " .$id. " updated successfully!";
