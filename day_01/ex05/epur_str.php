#!/usr/bin/php 
<?php
if ($argc == 2)
{
    $str = $argv[1];

    trim($str);
    $tab = explode(" ", $str);
    $i = 0;
        $len = count($tab);
        while($i < $len-1)
        {
            trim($tab[$i]);

            echo $tab[$i];
            if ($tab[$i] || $tab[$i] == '0')
               echo ' ';
            $i++;
        }
    echo $tab[$i]."\n";
}
?>