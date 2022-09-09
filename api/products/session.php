<?php

session_start();

$product_data = json_decode(file_get_contents("php://input"));

$product_id = $product_data->pid;


$_SESSION['pid'] = $product_id;

