<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$out = array();
$cust = json_decode(file_get_contents('php://input'));

$old = $cust->old;
$new = $cust->new;
$confirm = $cust->confirm;

$sql = "SELECT * FROM Customers WHERE cpass='$old'";
$query = $conn->query($sql);
if ($query->num_rows < 1) {
    $out['error'] = 'Incorrect current password! Try again!';
}
if ($query->num_rows > 0) {
    if ($new != $confirm) {
        $out['error'] = 'Wrong confirm password !';
    } else {
        $sql = "UPDATE Customers SET cpass = '" . $new . "' WHERE cid = '" . $_SESSION['cust'] . "'";
        $result = $conn->query($sql);
        $out['success'] = "Your new password is updated successfully.";
    }
}
echo json_encode($out);