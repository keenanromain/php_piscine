#!/usr/bin/php
<?php
while (true) {
	echo "Enter a number: ";
	$reader = fopen ("php://stdin","r");
	$answer = fgets($reader);
	if (!$answer) {
		echo "^D\n";
		exit;
	}
	$answer = rtrim($answer);
	if (!is_numeric($answer)) {
		echo "'$answer' is not a number";
	} elseif ($answer & 1) {
		echo "The number $answer is odd";
	} else {
		echo "The number $answer is even";
	}
	echo "\n";
}
?>
