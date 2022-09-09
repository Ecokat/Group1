<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';


//$sql = "SELECT * FROM Products WHERE pid = '" . $_SESSION['pid'] . "'";
$sql = "SELECT * 
        FROM product_category as pc
        INNER JOIN Products as p ON pc.pid = p.pid
        INNER JOIN Categories as c ON pc.ctgid = c.ctgid
        WHERE p.pid = '" . $_SESSION['pid'] . "'";
$query = $conn->query($sql);

while ($row = $query->fetch_array()) {
    $output[] = $row;
}
echo json_encode($output);

