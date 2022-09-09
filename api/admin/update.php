<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';
function sanitize_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}

$admin = json_decode(file_get_contents('php://input'));

$name = $admin->aname;
$name = sanitize_data($name);
$phone = $admin->aphone;
$phone = sanitize_data($phone);

$sql = "UPDATE Admin SET aname = '" . $name . "',  aphone = '" . $phone . "' WHERE aid = '" . $_SESSION['admin'] . "'";
$result = $conn->query($sql);

echo "ADMIN's Profile updated successfully !";
