<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

function sanitize_data($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES);
	return $data;
}
$out = array();
$cust = json_decode(file_get_contents('php://input'));

$email1 = $cust->email;
$email1 = sanitize_data($email1);
$password1 = $cust->password;

$confirm = $cust->confirm;

$fname1 = $cust->fname;
$fname1 = sanitize_data($fname1);
$lname1 = $cust->lname;
$lname1 = sanitize_data($lname1);
$phone1 = $cust->phone;
$phone1 = sanitize_data($phone1);

$sql = "SELECT * FROM Customers WHERE cemail='$email1'";
$query = $conn->query($sql);

if ($confirm != $password1) {
	$out['error'] = 'Wrong confirm password !';
} else {
	if ($query->num_rows > 0) {
		$out['error'] = 'This Email is already registered. Please try another email.';
	}
	if ($query->num_rows < 1) {


		$stmt = $conn->prepare("INSERT INTO Customers (cfname, clname, cemail, cpass, cphone) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $fname, $lname, $email, $password, $phone);
		$fname = $fname1;
		$lname = $lname1;
		$email = $email1;
		$password = $password1;
		$phone = $phone1;
		$stmt->execute();
		/*$sql = "INSERT INTO Customers (cname, cemail, cpass, cphone) 
			VALUES ('".$name1."','".$email1."', '".$password1."', '".$phone1."')";
	$query1 = $conn->query($sql);*/
		$out['success'] = 'Thank you for registering to our shop !';
		$stmt->close();
	}
}
echo json_encode($out);
