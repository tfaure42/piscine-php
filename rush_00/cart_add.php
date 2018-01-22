<?php
session_start();
$path_to_file = "htdocs/private/products";
if(file_exists('htdocs') === true)
if(file_exists('htdocs/private') === true)
if(file_exists($path_to_file) === true && $_POST['add_to_cart'])
{
    $i =0;
    $x = 0;
    $obj = file_get_contents($path_to_file);
    $obj = unserialize($obj);
    while ($obj[$i]['name'])
    {   
        if ($obj[$i]['name'] == $_POST['add_to_cart'])
            $x = $i; 
        $i++;   
    }
}
if ($_SESSION['logged_on_user'])
{
    
    $path_to_file = "htdocs/private/carts";
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $carts = file_get_contents($path_to_file);
        $carts = unserialize($carts);
        if (!$carts[$_SESSION['logged_on_user']]['qty'][$x])
        {
            $carts[$_SESSION['logged_on_user']]['qty'][$x] = 1;
            if ($carts[$_SESSION['logged_on_user']]['total'] >= 0)
                $carts[$_SESSION['logged_on_user']]['total'] += intval($obj[$x]['price']);
            else
                $carts[$_SESSION['logged_on_user']]['total'] = intval($obj[$x]['price']);
            $carts[$_SESSION['logged_on_user']]['amount'][$x] = intval($obj[$x]['price']);
            $carts[$_SESSION['logged_on_user']]['products'][$x] = intval($obj[$x]['price']);
            $serial = serialize($carts);
            file_put_contents($path_to_file, $serial);
            header('Location: cart.php');
            exit;
        }
        else if ($carts[$_SESSION['logged_on_user']]['qty'][$x] >= 1)
        {
            $carts[$_SESSION['logged_on_user']]['qty'][$x]++;
            $carts[$_SESSION['logged_on_user']]['total'] += intval($obj[$x]['price']);
            $carts[$_SESSION['logged_on_user']]['amount'][$x] += intval($obj[$x]['price']);
            $carts[$_SESSION['logged_on_user']]['products'][$x] = intval($obj[$x]['price']);
                $serial = serialize($carts);
                file_put_contents($path_to_file, $serial);
                header('Location: cart.php');
                exit;
        }
    }
}   
else if ($_SESSION['logged_on_user'] == '')
{
    if (!$_SESSION['qty'][$x] || $_SESSION['unlogged_cart'] == 'empty')
    {
        $_SESSION['unlogged_cart'] = 'n_empty';
        $_SESSION['qty'][$x] = 1;
        if ($_SESSION['total'] >= 0)
            $_SESSION['total'] += intval($obj[$x]['price']);
        else
            $_SESSION['total'] = intval($obj[$x]['price']);
    $_SESSION['amount'][$x] = intval($obj[$x]['price']);
    $_SESSION['products'][$x] = intval($obj[$x]['price']);
    header('Location: cart.php');
    exit;
    }
    else if ($_SESSION['qty'][$x] >= 1)
    {   
        $_SESSION['unlogged_cart'] = 'n_empty';
        $_SESSION['qty'][$x]++;
        $_SESSION['total'] += intval($obj[$x]['price']);
        $_SESSION['amount'][$x] = intval($obj[$x]['price']);
        $_SESSION['products'][$x] = intval($obj[$x]['price']);
        header('Location: cart.php');
        exit;
    }
}header('Location: cart.php');
?>