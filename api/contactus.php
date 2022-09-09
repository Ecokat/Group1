<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/group1/db_config.php';

$contact = json_decode(file_get_contents('php://input'));



$name = $contact->name;
$email = $contact->email;
$subject = $contact->subject;
$content = $contact->content;

$stmt = $conn->prepare("INSERT INTO Contact (name, email, subject, content) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nm, $em, $sj, $con);

$nm = $name;
$em = $email;
$sj = $subject;
$con = $content;
$stmt->execute();

