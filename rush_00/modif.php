<?php 
$path_to_file = "htdocs/private/passwd";
session_start();
if(file_exists('htdocs') === true)
if(file_exists('htdocs/private') === true)
if(file_exists($path_to_file) === true)
{
    $content = file_get_contents($path_to_file);
    $content = unserialize($content);
    $i = 0;
    while ($content[$i]['login'])
    {
        if ($_POST[$i] === 'Apply_changes' || $_POST[$i] === 'Delete')
        $x = $i;
        $i++;
    }
    if ($_POST[$x] === 'Apply_changes' && $_POST['login'] && $_POST['passwd'] && $_POST['admin'])
    {
        $content[$x]['login'] = $_POST['login'];
        $content[$x]['passwd'] = hash("sha256", $_POST['passwd']);
        if ($_POST['admin'] === 'true')
        $content[$x]['admin'] = true;
        else if ([$x]['admin'] === 'false')
        $content[$x]['admin'] = false;
        $serial = serialize($content);
        file_put_contents($path_to_file, $serial);
        header('Location: admin.php');
        exit;
    }
    else if ($_POST[$x] === 'Delete' && $_POST['login'] && $_POST['passwd'] && $_POST['admin']);
    {
        $i = 0;
        $y = 0;
        while ($content[$y]['login'])
        {
            if ($y == $x)
            $y++;
            if ($content[$y]['login'])
            $new[$i] = $content[$y];
            $y++;
            $i++;
        }
        $serial = serialize($new);
        file_put_contents($path_to_file, $serial);
    }
}
header('Location: index.php');
?>