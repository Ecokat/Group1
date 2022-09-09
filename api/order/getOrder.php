<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$sql = "SELECT * 
        FROM OrderItems as oi
        INNER JOIN Orders as o
        ON oi.orderid = o.orderid
        INNER JOIN Products as p
        ON oi.pid = p.pid
        WHERE o.orderid = '" . $_SESSION['orderID'] . "'";

$result = $conn->query($sql);


while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);
