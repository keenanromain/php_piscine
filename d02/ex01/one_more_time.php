#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');

function month_to_number($s1)
{
	if ($s1 == "janvier" || $s1 == "Janvier")
		return (1);
	if ($s1 == "fevrier" || $s1 == "Fevrier" || $s1 == "Février" || $s1 == "février")
		return (2);
	if ($s1 == "mars" || $s1 == "Mars")
		return (3);
	if ($s1 == "avril" || $s1 == "Avril")
		return (4);
	if ($s1 == "mai" || $s1 == "Mai")
		return (5);
	if ($s1 == "Juin" || $s1 == "juin")
		return (6);
	if ($s1 == "juillet" || $s1 == "Juillet")
		return (7);
	if ($s1 == "Aout" || $s1 == "aout" || $s1 == "Août" || $s1 == "août")
		return (8);
	if ($s1 == "septembre" || $s1 == "Septembre")
		return (9);
	if ($s1 == "octobre" || $s1 == "Octobre")
		return (10);
	if ($s1 == "novembre" || $s1 == "Novembre")
		return (11);
	return (12);
}

$err = "Wrong Format\n";
if ($argc != 2 && print($err))
    die();
$str = trim(preg_replace("/\s+/", " ", $argv[1]));
if (count(explode(" ", $str)) != 5 && print($err))
    die();
if (!(preg_match("/(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche) {1}([0-9]{1,2}) {1}([J|j]anvier|[F|f][e|é]vrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d][e|é]cembre) {1}[0-9]{4} {1}[0-9]{2}:[0-9]{2}:[0-9]{2}$/", $str)) && print($err))
    die();
preg_match("/([0-9]{1,2})/", $str, $day);
preg_match("/([J|j]anvier|[F|f][e|é]vrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[N|n]ovembre|[D|d][e|é]cembre)/", $str, $month);
preg_match("/[0-9]{4}/", $str, $year);
preg_match("/[0-9]{2}:/", $str, $hour);
preg_match("/:[0-9]{2}:/", $str, $min);
preg_match("/:[0-9]{2}$/", $str, $sec);
echo mktime(trim($hour[0], ":"), trim($min[0], ":"), trim($sec[0], ":"), month_to_number($month[0]), $day[0], $year[0]) . "\n";
?>