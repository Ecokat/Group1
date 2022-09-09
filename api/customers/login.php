<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/group1/db_config.php';


$out = array('error' => false);

$cust = json_decode(file_get_contents('php://input'));

$email = $cust->email;
$password = $cust->password;

$sql = "SELECT * FROM Admin WHERE aemail='$email' AND apass='$password'";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
	$row = $query->fetch_array();
	$_SESSION['admin'] = $row['aid'];
	$out['admin'] = uniqid();
} else {
	$sql = "SELECT * FROM Customers WHERE cemail='$email' AND cpass='$password'";
	$query = $conn->query($sql);

	if ($query->num_rows > 0) {
		$row = $query->fetch_array();
		$out['message'] = 'Login Successful';
		$out['cust'] = uniqid();
		$_SESSION['cust'] = $row['cid'];
		$_SESSION['name'] = $row['cfname'];
		$_SESSION['email'] = $row['cemail'];
		$_SESSION['phone'] = $row['cphone'];
	} else {
		$out['error'] = true;
		$out['message'] = 'Invalid Email or Password. Please try again !';
	}
}
echo json_encode($out);
