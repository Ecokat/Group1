<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$review = file_get_contents('php://input');





    $sql = "UPDATE Reviews SET review = '" . $review . "' WHERE orderid = '" . $_SESSION['orderID'] . "'";
    $result = $conn->query($sql);

