<?php
    $path_to_file = "../htdocs/private/chat";
    $i= 0;
if(file_exists('../htdocs') === true)
if(file_exists('../htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $content = file_get_contents($path_to_file);
        $content = unserialize($content);
        while ($content[$i]['login'])
        {
            echo date("[H:i]", $content[$i]['time'])." <b>".$content[$i]['login']."</b>:".$content[$i]['msg']."<br />";
            $i++;
        }
    }
?>