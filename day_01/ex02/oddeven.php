#!/usr/bin/php 
<?php
    echo "Entrez un nombre: "; 
    while ($nbr = fgets(STDIN))
    {
        $nbr = trim($nbr);
        if (is_numeric($nbr))
        {
        $len = strlen($nbr) - 1;
        if ($nbr[$len] % 2 === 0)
            echo "le chiffre ".$nbr." est Pair\n";
        else
            echo "le chiffre ".$nbr." est Impair\n";
        }
    else
        echo "'".$nbr."' n'est pas un chiffre\n";
    echo "Entrez un nombre: ";
    }
    printf("^D\n");

?>