#!/usr/bin/php
<?php
    if ($argc == 4)
    {
        if (trim($argv[2]) == "+")
        echo (trim($argv[1]) + trim($argv[3]))."\n";
        else if (trim($argv[2]) == "*")
        echo (trim($argv[1]) * trim($argv[3]))."\n";
        else if (trim($argv[2]) == "/")
        echo (trim($argv[1]) / trim($argv[3]))."\n";
        else if (trim($argv[2]) == "-")
        echo (trim($argv[1]) - trim($argv[3]))."\n";
        else if (trim($argv[2]) == "%")
        echo (trim($argv[1]) % trim($argv[3]))."\n";
    }
    else
    echo "Incorrect Parameters\n";
?>