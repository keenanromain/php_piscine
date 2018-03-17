#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $str = trim(preg_replace("/\s+/", " ", $argv[1]));
        echo "$str\n";
    }
?>
