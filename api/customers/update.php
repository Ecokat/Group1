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

$cust = json_decode(file_get_contents('php://input'));

$fname = $cust->cfname;
$fname = sanitize_data($fname);
$lname = $cust->clname;
$lname = sanitize_data($lname);
$phone = $cust->cphone;
$phone = sanitize_data($phone);

$sql = "UPDATE Customers SET cfname = '" . $fname . "', clname = '" . $lname . "', cphone = '" . $phone . "' WHERE cid = '" . $_SESSION['cust'] . "'";
$result = $conn->query($sql);
$_SESSION['name'] = $fname;
echo "User's Profile updated successfully !";
