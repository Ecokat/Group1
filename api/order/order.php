<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$order = json_decode(file_get_contents('php://input'));


if (isset($_SESSION['cust'])) {
    $phone = $order->phone;
    $address = $order->address;
    $payment = $order->payment;
    $total = $order->total;
    if ($payment == "Cash on Delivery") {
        $stmt = $conn->prepare("INSERT INTO Orders (cid, payment, address, total, phone, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $id, $pay, $adr, $tt, $ph, $status);
        $id = $_SESSION['cust'];
        $pay = $payment;
        $adr = $address;
        $tt = $total;
        $ph = $phone;
        $status = "Unpaid";
        $stmt->execute();
        $_SESSION["orderID"] = $conn->insert_id;
    } else {
        $stmt = $conn->prepare("INSERT INTO Orders (cid, payment, address, total, phone, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issdss", $id, $pay, $adr, $tt, $ph, $status);
        $id = $_SESSION['cust'];
        $pay = $payment;
        $adr = $address;
        $tt = $total;
        $ph = $phone;
        $status = "Paid";
        $stmt->execute();
        $_SESSION["orderID"] = $conn->insert_id;
    }
} else {
    $phone = $order->phone;
    $address = $order->address;
    $payment = $order->payment;
    $total = $order->total;
    $name = $order->name;
    $email =  $order->email;
    if ($payment == "Cash on Delivery") {
        $stmt = $conn->prepare("INSERT INTO Orders (fullname, email, payment, address, total, phone, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nm, $em, $pay, $adr, $tt, $ph, $status);
        $nm = $name;
        $em = $email;
        $pay = $payment;
        $adr = $address;
        $tt = $total;
        $ph = $phone;
        $status = "Unpaid";
        $stmt->execute();
        $_SESSION["orderID"] = $conn->insert_id;
        $_SESSION["phone"] = $phone;
        $_SESSION["fullname"] = $name;
    } else {
        $stmt = $conn->prepare("INSERT INTO Orders ( fullname, email, payment, address, total, phone, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nm, $em, $pay, $adr, $tt, $ph, $status);
        $nm = $name;
        $em = $email;
        $pay = $payment;
        $adr = $address;
        $tt = $total;
        $ph = $phone;
        $status = "Paid";
        $stmt->execute();
        $_SESSION["orderID"] = $conn->insert_id;
        $_SESSION["phone"] = $phone;
        $_SESSION["fullname"] = $name;
    }
}
