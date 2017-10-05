#!/usr/bin/php
<?php
function ft_split($str) {
	if (!$str)
		exit;
	$str = trim(preg_replace("/\s+/", " ", $str));
	$arr = explode(" ", $str);
	sort($arr);
	return ($arr);
}
?>
