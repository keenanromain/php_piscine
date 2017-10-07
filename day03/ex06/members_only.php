<?php
if ($_SERVER["PHP_AUTH_USER"] !== "zaz" || $_SERVER["PHP_AUTH_PW"] !== "jaimelespetitponeys") {
	header("HTTP/1.0 401 Unauthorized");
	header('WWW-Authenticate: Basic realm=\'\'Member area\'\'');
	echo "<html><body>This area is accessible for members only</body></html>\n";
	exit;
}
$img = file_get_contents("../img/42.png");
echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64," . base64_encode($img) . "'>\n</body></html>\n";
?>
