<?php
function newcart($name)
{
    $path_to_file = "htdocs/private/carts";
        $i= 0;
        if(file_exists('htdocs') === true)
        if(file_exists('htdocs/private') === true)
        if(file_exists($path_to_file) === true)
        {
            $cart = file_get_contents($path_to_file);
            $cart = unserialize($cart);
        }
        $cart[$name]['total'] = 0;
        $serial = serialize($cart);
        if(file_exists('htdocs') === false)
        mkdir('htdocs');
        if(file_exists('htdocs/private') === false)
        mkdir('htdocs/private');
        file_put_contents($path_to_file, $serial);
            return($i);
}
?>