#!/usr/bin/php
<?php
    echo preg_match("/(lundi|mardi|mercredi|jeudi|vendredi|samedi|dimanche) [0-9]{2} (janvier|fevrier|mars|avril|mai|juin|juillet|aout|septembre|octobre|novembre|decembre)   {4} [0-9]{2}:[0-9]{2}:[0-9]{2}/", $argv[1])."\n";
?>