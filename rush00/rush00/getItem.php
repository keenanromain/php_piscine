<?php

include 'inventory.php';
include 'auth.php';
include 'account_actions.php';

//$user = $_POST['login'];
//$pass = $_POST['passwd'];
$barcode = $_POST['barcode'];

//$pwHash = hash("whirlpool", $pass);

$item = getItem($barcode);
if ($item)
	print_r($item);
else
	echo ("KO!\n");

?>