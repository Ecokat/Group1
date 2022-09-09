<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$order = json_decode(file_get_contents('php://input'));
$id = $order->orderid;

$sql = "DELETE FROM Orders WHERE orderid = '" . $id . "'";
$query = $conn->query($sql);
$sql = "DELETE FROM OrderItems WHERE orderid = '" . $id . "'";
$query = $conn->query($sql);

