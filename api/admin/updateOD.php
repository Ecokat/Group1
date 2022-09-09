<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/group1/db_config.php';


$order = json_decode(file_get_contents('php://input'));

$id = $order->orderid;
$pid = $order->pid;
$qty = $order->quantity;



$sql = "UPDATE OrderItems SET quantity = '" . $qty . "' 
        WHERE orderid = '" . $id . "'
        AND pid = '" . $pid . "'";
$result = $conn->query($sql);

echo "Order  updated successfully!";
