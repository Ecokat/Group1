<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/group1/db_config.php';



$cust = json_decode(file_get_contents('php://input'));

$email1 = $cust->email;
$password1 = $cust->pass;
$fname1 = $cust->fname;
$lname1 = $cust->lname;
$phone1 = $cust->phone;


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
$stmt->close();


echo "Insert data to Customers successfully !";
