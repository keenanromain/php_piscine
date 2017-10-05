#!/usr/bin/php 
<?php
function search($find, $argv) {
	array_shift($argv);
	array_shift($argv);
	$found = NULL;
	for ($i = 0; $argv[$i]; $i++) {
		$half = explode(":", $argv[$i]);
		if ($find == $half[0]) {
			$found = $half[1];
		}
	}
	if ($found)
		echo $found . "\n";
}
if ($argc < 2)
	exit;
search($argv[1], $argv);
?>
