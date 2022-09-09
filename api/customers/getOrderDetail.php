<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$sql = "SELECT * 
        FROM OrderItems as oi
        INNER JOIN Products as p ON oi.pid = p.pid
        WHERE oi.orderid = '" . $_SESSION['oid'] . "'";
$query = $conn->query($sql);

while ($row = $query->fetch_array()) {
    $output[] = $row;
}
echo json_encode($output);



