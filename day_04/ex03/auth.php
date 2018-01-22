<?php
function auth($login, $passwd)
{
    $path_to_file = "../htdocs/private/passwd";
    $i = 0;
    $content = file_get_contents($path_to_file);
    $content = unserialize($content);
    $len = count($content);
    while ($i < $len)
    {
        if ($content[$i]['login'] === $login && $content[$i]['passwd'] === hash("sha256", $passwd))
        {
            return(true);
        }
        $i++;
    }
    return(false);
}
?>