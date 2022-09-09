<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$rating = file_get_contents('php://input');





    $stmt = $conn->prepare("INSERT INTO Reviews (orderid, rating) VALUES (?, ?)");
    $stmt->bind_param("ii", $id, $rate);
    $id = $_SESSION['orderID'];
    $rate = $rating;
    $stmt->execute();

