<?php
    function ft_is_sort($tab)
    {
        $sorted = $tab;
        if ($sorted)
            sort($sorted);
        $i = 0;
        $len = count($tab);
        while ($i < $len)
        {
            if (strcmp($tab[$i],$sorted[$i]) != 0)
                return(0);
            $i++;
        }
        return(1);
    }
?>