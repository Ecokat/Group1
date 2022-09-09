<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$sql = "SELECT * 
        FROM Products as p
        INNER JOIN product_category as pc
        ON p.pid = pc.pid
        WHERE ctgid = 6";

$result = $conn->query($sql);


while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);
