#!/usr/bin/php
<?php
$i = 2;
$joined = $argv[1];
while ($i < $argc)
{
    $joined = $joined . ' ' . $argv[$i];
    $i++;
}
$joined = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $joined)));
$tab = explode(' ', $joined);
$i = 0;
$len = count($tab);
while ($i < $len)
{
    if (is_numeric($tab[$i]))
    {
        $nums = $nums . ' ' . $tab[$i];
    }
    else if (ctype_alpha($tab[$i]))
    {
        $strings = $strings . ' ' . $tab[$i];
    }
    else
        $others = $others . ' ' . $tab[$i];
    $i++;

}
$string = explode(' ', $strings);
$num = explode(' ', $nums);
$other = explode(' ', $others);
print_tab($string);
print_tab($num);
print_tab($other);
function print_tab($array)
{
    sort($array, SORT_NATURAL | SORT_FLAG_CASE);
    $i = 1;
    $tab_len = count($array);
    while ($i < $tab_len)
    {
        print($array[$i]);
        $i++;
        print("\n");
    }

}
?>