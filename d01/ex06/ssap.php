#!/usr/bin/php
<?php
	if ($argc < 2) {
		exit;
	}
	for ($i = 1; $argv[$i]; $i++) {
		$str = $str . " " . $argv[$i];
	}
	$str = trim(preg_replace("/\s+/", " ", $str));
	$stack = explode(" ", $str);
	sort($stack);
	foreach ($stack as $element) {
		echo "$element\n";
	}
?>
