<?php 
session_start();
include 'login.php';
include 'newcart.php';
$path_to_file = "htdocs/private/passwd";
if ($_POST['submit'] === 'SignUp' && $_POST['login'] && $_POST['passwd'])
{
    $i= 0;
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $content = file_get_contents($path_to_file);
        $content = unserialize($content);
        while ($content[$i]['login'])
        {
            if ($content[$i]['login'] === $_POST['login'])
            {
                header('Location: index.php');
                exit;
            }
            $i++;
        }
    }
    $content[$i]['login'] = $_POST['login'];
    $content[$i]['passwd'] = hash("sha256", $_POST['passwd']);
    $content[$i]['cart'] = newcart($_POST['login']);
    $serial = serialize($content);
    if(file_exists('htdocs') === false)
        mkdir('htdocs');
    if(file_exists('htdocs/private') === false)
        mkdir('htdocs/private');
        file_put_contents($path_to_file, $serial);
}
else if ($_POST['submit'] === 'Login' && $_POST['login'] && $_POST['passwd'])
    login($_POST['login'],$_POST['passwd']);
else if ($_POST['submit'] === 'Create_account' && $_POST['login'] && $_POST['passwd'] && $_POST['admin'])
{
    $i= 0;
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $content = file_get_contents($path_to_file);
        $content = unserialize($content);
        while ($content[$i]['login'])
        {
            if ($content[$i]['login'] === $_POST['login'])
            {
                header('Location: admin.php');
                exit;
            }
            $i++;
        }
    }
    $content[$i]['login'] = $_POST['login'];
    $content[$i]['passwd'] = hash("sha256", $_POST['passwd']);
    $content[$i]['cart'] = newcart($_POST['login']);
    if ($_POST['admin'] == 'true')
        $content[$i]['admin'] = true;
    else if ($_POST['admin'] == 'false')
        $content[$i]['admin'] = true;
    $serial = serialize($content);
    if(file_exists('htdocs') === false)
        mkdir('htdocs');
    if(file_exists('htdocs/private') === false)
        mkdir('htdocs/private');
        file_put_contents($path_to_file, $serial);
        header('Location: admin.php');
}
header('Location: index.php');

?>