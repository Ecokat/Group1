<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$ctg = json_decode(file_get_contents('php://input'));
$id = $ctg->ctgid;

$sql = "DELETE FROM Categories WHERE ctgid = '" . $id . "'";
$query = $conn->query($sql);
$sql = "DELETE FROM product_category WHERE ctgid = '" . $id . "'";
$query = $conn->query($sql);

