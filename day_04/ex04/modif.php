<?php 
$path_to_file = "../htdocs/private/passwd";
if(file_exists('../htdocs') === true)
if(file_exists('../htdocs/private') === true)
if(file_exists($path_to_file) === true)
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
                header('Location: http://e3r13p1.42.fr:8080/d04/ex04/');
                exit;
            }
            $i++;
        }
        $serial = serialize($content);
        file_put_contents($path_to_file, $serial);
}
echo "ERROR\n";
header('Location: http://e3r13p1.42.fr:8080/d04/ex04/');
?>