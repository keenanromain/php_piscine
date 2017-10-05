#!/usr/bin/php
<?php
	if ($argc < 2) {
		exit;
	}
	$str = trim(preg_replace('/\s+/', ' ', $argv[1]));
	if (!strchr($str, ' ')) {
		echo "$str\n";
	} else {
		$stack = explode(' ', $str);
		$first = array_shift($stack);
		foreach ($stack as $element) {
			echo "$element ";
		}
		echo "$first\n";
	}
?>
