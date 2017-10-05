#!/usr/bin/php
<?php
	function ft_spl($str)
	{
		if (!$str)
			return (NULL);
		$spl = explode(" ", $str);
		$clean = array_filter($spl);
		natcasesort($clean);
		return ($clean);
	}

	for ($i = 1; $i < $argc; $i++)
		$str .= " " . $argv[$i];
	$spl = ft_spl($str);
	if (count($spl) > 0)
		foreach ($spl as $val)
		{
			if (is_numeric($val[0]))
				$arrnum[] = $val;
			else if (ctype_alpha($val[0]))
				$arrword[] = $val;
			else
				$arrelse[] = $val;
		}
	if (count($arrnum) > 0)
		sort($arrnum, SORT_STRING);
	if (count($arrword) > 0)
		foreach ($arrword as $value)
			echo $value . "\n";
	if (count($arrnum) > 0)
		foreach ($arrnum as $value)
			echo $value . "\n";
	if (count($arrelse) > 0)
		foreach ($arrelse as $value)
			echo $value . "\n";
?>
