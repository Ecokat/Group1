<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';



$output = array();
$sql = "SELECT * FROM Orders WHERE cid = '" . $_SESSION['cust'] . "'";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
	$output[] = $row;
}
echo json_encode($output);
