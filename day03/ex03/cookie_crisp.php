<?php
$action = $_GET['action'];
$name = $_GET['name'];
$value = $_GET['value'];
if ($action && $name)
{
	if ($action === "set" && $value)
			setcookie($name, $value, time() + 3600);
		else if ($action === "get" && $_COOKIE[$name])
				echo "$_COOKIE[$name]\n";
		else if ($action === "del")
				setcookie($name);
}
?>
