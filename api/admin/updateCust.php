<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';


$cust = json_decode(file_get_contents('php://input'));

$id = $cust->cid;
$fname = $cust->cfname;
$lname = $cust->clname;
$pass = $cust->cpass;
$email = $cust->cemail;
$phone = $cust->cphone;


$sql = "UPDATE Customers SET   cfname = '" . $fname . "',  clname = '" . $lname . "', cpass = '" . $pass . "', cemail = '" . $email . "', cphone = '" . $phone . "' 
        WHERE cid = '" . $id . "'";
$result = $conn->query($sql);

echo "Customer No. " .$id. " updated successfully!";
