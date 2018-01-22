<?php
function auth($login, $passwd)
{
    $path_to_file = "htdocs/private/passwd";
    $i = 0;
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
    $content = file_get_contents($path_to_file);
    $content = unserialize($content);
    while ($content[$i]['login'])
    {
        if ($content[$i]['login'] === $login && $content[$i]['passwd'] === hash("sha256", $passwd))
        {
            if ($content[$i]['admin'] == true)
                $_SESSION['admin_logged'] = true;
            return(true);
        }
        $i++;
    }
    }
        return(false);
    }
?>