#!/usr/bin/php
<?php
if ($argc < 2)
	exit();

$to_search = trim($argv[1]);
$value = NULL;

for ($i = 2; $i < $argc; $i++)
{
	$str = $argv[$i];
	$length = strlen($str);

	for ($j = 0; $j < $length; $j++)
	{
		if ($str[$j] == ':')
		{
			$key = trim(substr($str, 0, $j));

			if ($key == $to_search)
				$value = substr($str, $j + 1, $length - $j);
			break ;
		}
	}
}
if ($value != NULL)
	echo $value . "\n";
?>