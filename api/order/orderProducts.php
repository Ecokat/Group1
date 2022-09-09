<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$orders = json_decode(file_get_contents('php://input'));


$total = 0;

if (isset($_SESSION['cust'])) {
    foreach ($orders as $order) {
        $stmt = $conn->prepare("INSERT INTO OrderItems (orderid, pid, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $id, $pid, $qty);
        $id = $_SESSION['orderID'];
        $pid = $order->product_id;
        $qty = $order->product_quantity;
        $stmt->execute();
    }
    foreach ($orders as $order) {
        $total += $order->product_quantity * $order->product_price;
    }
    $total = $total * 95 / 100;
    $sql = "UPDATE Orders SET total = '" . $total . "' WHERE orderid = '" . $_SESSION['orderID'] . "'";
    $result = $conn->query($sql);
    unset($_SESSION["shopping_cart"]);
}
else {
    foreach ($orders as $order) {
        $stmt = $conn->prepare("INSERT INTO OrderItems (orderid, pid, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $id, $pid, $qty);
        $id = $_SESSION['orderID'];
        $pid = $order->product_id;
        $qty = $order->product_quantity;
        $stmt->execute();
    }
    foreach ($orders as $order) {
        $total += $order->product_quantity * $order->product_price;
    }
    $sql = "UPDATE Orders SET total = '" . $total . "' WHERE orderid = '" . $_SESSION['orderID'] . "'";
    $result = $conn->query($sql);
    unset($_SESSION["shopping_cart"]);

}