#!/usr/bin/php 
<?php
function ft_is_sort($arr) {
	$copy = $arr;
	sort($copy);
	return ($copy === $arr) ? (1) : (0);
}
?>
