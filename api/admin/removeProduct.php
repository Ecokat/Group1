<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$prd = json_decode(file_get_contents('php://input'));
$id = $prd->pid;

$sql = "DELETE FROM Products WHERE pid = '" . $id . "'";
$query = $conn->query($sql);
$sql = "DELETE FROM product_category WHERE pid = '" . $id . "'";
$query = $conn->query($sql);

