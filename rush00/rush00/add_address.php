<?php

$path = "private/accounts";

include ('address_books.php');
include ('account_actions.php');

if (!file_exists("private"))
    mkdir("private");
if ($_POST['submit'] == "OK")
{
    $user = $_POST['login'];
    $pass = $_POST['passwd'];
	$name = $_POST['addrName'];
	$address = $_POST['address'];
    $pwHash = hash("whirlpool", $pass);
    if (addAddress($user, $pwHash, $name, $address))
    {
        echo("OK\n");
    }
    else
    {
        echo("ERROR\n");
    }
}

?>