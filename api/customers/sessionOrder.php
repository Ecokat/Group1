<?php

session_start();

$order= json_decode(file_get_contents("php://input"));

$id = $order->orderid;


$_SESSION['oid'] = $id;


