<?php 
$path_to_file = "../htdocs/private/passwd";
if ($_POST['submit'] === 'OK' && $_POST['login'] && $_POST['oldpw']&& $_POST['newpw'])
{
    $i= 0;
        $content = file_get_contents($path_to_file);
        $content = unserialize($content);
        $len = count($content);
        while ($i < $len)
        {
            if ($content[$i]['login'] === $_POST['login'] && $content[$i]['passwd'] === hash("sha256", $_POST['oldpw']))
            {
                $content[$i]['passwd'] = hash("sha256", $_POST['newpw']);
                $serial = serialize($content);
                file_put_contents($path_to_file, $serial);
                echo "OK\n";
                exit;
            }
            $i++;
        }
        $serial = serialize($content);
        file_put_contents($path_to_file, $serial);
        echo "ERROR\n";
}
else
    echo "ERROR\n";
?>