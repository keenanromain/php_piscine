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
	//	if ($second == 0)
	//		;
	//	else
			echo $first / $second . "\n";
	}
	function moder($first, $second) {
		//if ($second == 0)
		//	;
		//else
			echo $first % $second . "\n";
	}

	if ($argc != 2) {
		echo "Incorrect Parameters\n";
		exit;
	}
	$str = $argv[1];
	trim($str);
	for ($i = 0; $str[$i]; $i++) {
		if (ctype_alpha($str[$i])) {
			echo "Syntax Error\n";
			exit;
		}
	}
	$j = 0;
	while ($str[$j] && $str[$j] != '+' && $str[$j] != '-' && $str[$j] != '*' && $str[$j] != '/' && $str[$j] != '%') {
		$first .= $str[$j];
		$j++;
	}
	$type = $str[$j];
	while ($str[++$j]) {
		$second .= $str[$j];
	}
	trim($first);
	trim($second);
	switch ($type) {
	case '+':
		adder((int)$first, (int)$second);
		break;
	case '-':
		subtracter((int)$first, (int)$second);
		break;
	case '*':
		multiplier((int)$first, (int)$second);
		break;
	case '/':
		divider((int)$first, (int)$second);
		break;
	case '%':
		moder((int)$first, (int)$second);
		break;
	default:
		break;
	}
?>
