#!/usr/bin/php
<?php
	function adder($first, $second) {
		echo $first + $second . "\n";
	}
	function subtracter($first, $second) {
		echo $first - $second . "\n";
	}
	function multiplier($first, $second) {
		echo $first * $second . "\n";
	}
	function divider($first, $second) {
		//if ($second == 0)
		//	;
		//else
			echo $first / $second . "\n";
	}
	function moder($first, $second) {
		//if ($second == 0)
		//	;
		//else
			echo $first % $second . "\n";
	}

	if ($argc != 4) {
		echo "Incorrect Parameters\n";
		exit;
	}
	$first = (int)$argv[1];
	$type = $argv[2];
	$second = (int)$argv[3];
	switch (trim($type)) {
	case '+':
		adder($first, $second);
		break;
	case '-':
		subtracter($first, $second);
		break;
	case '*':
		multiplier($first, $second);
		break;
	case '/':
		divider($first, $second);
		break;
	case '%':
		moder($first, $second);
		break;
	default:
		break;
	}
?>
