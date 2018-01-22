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
    if ($tab)
        sort($tab);
    return $tab;
}
?>