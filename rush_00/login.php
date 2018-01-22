<?php
function login($login, $passwd)
{
    session_start();
include 'auth.php';
$path_to_file = "htdocs/private/carts";
if ($login && $passwd)
{
    if (auth($login, $passwd) == true)
        {
            $_SESSION['logged_on_user'] = $login;
            if ($_SESSION['unlogged_cart'] == 'n_empty')
            {
                if(file_exists('htdocs') === true)
                    if(file_exists('htdocs/private') === true)
                        if(file_exists($path_to_file) === true)
                            {
                                $cart = file_get_contents($path_to_file);
                                $cart = unserialize($cart);
                                $cart[$login]['total'] = $_SESSION['total'];
                                $cart[$login]['products'] = $_SESSION['products'];
                                $cart[$login]['qty'] = $_SESSION['qty'];
                                $cart[$login]['amount'] = $_SESSION['amount'];
                                $serial = serialize($cart);
                                file_put_contents($path_to_file, $serial);
                            }
            }
        }
    else
    {
        $_SESSION['logged_on_user'] = '';
    }
}
}
?>