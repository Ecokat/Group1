<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$out = array();
$admin = json_decode(file_get_contents('php://input'));

$old = $admin->old;
$new = $admin->new;
$confirm = $admin->confirm;

$sql = "SELECT * FROM Admin WHERE apass='$old'";
$query = $conn->query($sql);
if ($query->num_rows < 1) {
    $out['error'] = 'Incorrect current password! Try again!';
}
if ($query->num_rows > 0) {
    if ($new != $confirm) {
        $out['error'] = 'Wrong confirm password !';
    } else {
        $sql = "UPDATE Admin SET apass = '" . $new . "' WHERE aid = '" . $_SESSION['admin'] . "'";
        $result = $conn->query($sql);
        $out['success'] = "Your new password is updated successfully.";
    }
}
echo json_encode($out);