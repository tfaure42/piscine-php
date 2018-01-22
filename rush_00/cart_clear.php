<?php
session_start();
$path_to_file = "htdocs/private/carts";
if ($_POST['cleancart'] == 'OK' && $_SESSION['logged_on_user'])
{
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $cart = file_get_contents($path_to_file);
        $cart = unserialize($cart);
        $cart[$_SESSION['logged_on_user']] = 'empty';
        $serial = serialize($cart);
        file_put_contents($path_to_file, $serial);
    }
}
else if ($_POST['cleancart'] == 'OK' && !$_SESSION['logged_on_user'])
{
    $_SESSION['unlogged_cart'] = 'empty';
    exit;
}
?>