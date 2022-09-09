<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';


$order = json_decode(file_get_contents('php://input'));

$id = $order->orderid;
$address = $order->address;
$phone = $order->phone;
$payment = $order->payment;
$status = $order->status;


$sql = "UPDATE Orders SET orderid = '" . $id . "',  address = '" . $address . "',  phone = '" . $phone . "', payment = '" . $payment . "', status = '" . $status . "' 
        WHERE orderid = '" . $id . "'";
$result = $conn->query($sql);

echo "Order No. " .$id. " updated successfully!";
