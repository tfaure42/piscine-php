#!/usr/bin/php
<?PHP
function ft_split($str)
{
    $str = trim($str);
    $tab = explode(' ',$str);
    $i = 0;
    $len = count($tab);
    while($i < $len)
    {
        if (! ($tab[$i] || $tab[$i] == '0'))
            unset($tab[$i]);
            $i++;
    }
    return $tab;
}
$i = 1;
$x = 0;
while ($i < $argc)
{
    $str = $argv[$i];
    $tab = ft_split($str);
    $len = count($tab);
    $y = 0;
    while ($y < $len)
    {
        $bigtab[$x] = $tab[$y];
        $y++;
        $x++;
    }
    $i++;
}
if ($bigtab)
    sort($bigtab);
$t = 0;
while ($t < $x)
{
    echo $bigtab[$t]."\n";
    $t++;
}
?>