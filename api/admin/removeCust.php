<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$cust = json_decode(file_get_contents('php://input'));
$id = $cust->cid;

$sql = "DELETE FROM Customers WHERE cid = '" . $id . "'";
$query = $conn->query($sql);

