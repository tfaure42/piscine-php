<?php 
$path_to_file = "../htdocs/private/passwd";
if ($_POST['submit'] === 'OK' && $_POST['login'] && $_POST['passwd'])
{
    $i= 0;
    if(file_exist('../htdocs') === true)
    if(file_exists('../htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $content = file_get_contents($path_to_file);
        $content = unserialize($content);
        while ($content[$i]['login'])
        {
            if ($content[$i]['login'] === $_POST['login'])
            {
                echo "ERROR\n";
                $error = 1;
            }
            $i++;
        }
    }
    if ($error !== 1)
    {
        $content[$i]['login'] = $_POST['login'];
        $content[$i]['passwd'] = hash("sha256", $_POST['passwd']);
        echo "OK\n";
    }
    $serial = serialize($content);
    if(file_exists('../htdocs') === false)
        mkdir('../htdocs');
    if(file_exists('../htdocs/private') === false)
        mkdir('../htdocs/private');
        file_put_contents($path_to_file, $serial);
}
else
    echo "ERROR\n";
?>