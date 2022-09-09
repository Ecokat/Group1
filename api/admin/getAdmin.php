<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';



$output = array();
$sql = "SELECT * FROM Admin WHERE aid = '" . $_SESSION['admin'] . "'";
$query = $conn->query($sql);
while ($row = $query->fetch_array()) {
	$output[] = $row;
}
echo json_encode($output);
