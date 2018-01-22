#!/usr/bin/php
<?php

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
function    check_num($nbrs)
{
    if (count($nbrs) == 2)
    {
    if (is_numeric($nbrs[0]) == false || is_numeric($nbrs[1]) == false)
        return -1;
    else
        return 0;
    }
    else
    return -1;
}
if ($argc == 2)
{
    $str = $argv[1];
    $tab = ft_split($str);
    $str = implode($tab);
        if (strstr($str, "+") !== false)
        {
            $nbrs = explode("+",$str);
            if (check_num($nbrs) == -1)
            {echo "Syntax Error\n";
                return 0;}
        echo ($nbrs[0] + $nbrs[1])."\n";
        }
        else if (strstr($str, "*") !== false)
        {
            $nbrs = explode("*",$str);
            if (check_num($nbrs) == -1)
            {echo "Syntax Error\n";
                return 0;}
        echo ($nbrs[0] * $nbrs[1])."\n";
        }
        else if (strstr($str, "/") !== false)
        {
            $nbrs = explode("/",$str);
            if (check_num($nbrs) == -1)
            {echo "Syntax Error\n";
                return 0;}
            if ($nbrs[1] == 0)
                echo "Dividing by 0 is impossible, I mean you should know that.\n";
            else
            echo ($nbrs[0] / $nbrs[1])."\n";
        }
        else if (strstr($str, "-") !== false)
        {
            $nbrs = explode("-",$str);
            if (check_num($nbrs) == -1)
            {echo "Syntax Error\n";
                return 0;}
        echo ($nbrs[0] - $nbrs[1])."\n";
        }
        else if (strstr($str, "%") !== false)
        {
            $nbrs = explode("%",$str);
            if (check_num($nbrs) == -1)
            {echo "Syntax Error\n";
                return 0;}
        echo ($nbrs[0] % $nbrs[1])."\n";
        }
        else
        {
            echo "Syntax Error\n";
        }
    }
    else
    echo "Incorrect Parameters\n";
?>