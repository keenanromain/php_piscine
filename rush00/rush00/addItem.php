<?php

include 'inventory.php';
include 'auth.php';
include 'account_actions.php';

$user = $_POST['login'];
$pass = $_POST['passwd'];
$barcode = $_POST['barcode'];
$quantity = $_POST['itemQuantity'];
$price = $_POST['itemPrice'];
$name = $_POST['itemName'];
$description = $_POST['itemDescription'];

$info['barcode'] = $barcode;
$info['name'] = $name;
$info['quantity'] = $quantity;
$info['price'] = $price;
$info['description'] = $description;

$pwHash = hash("whirlpool", $pass);

if (addItem($user, $pwHash, $barcode, $info))
	echo ("OK!\n");
else
	echo ("KO!\n");

?>