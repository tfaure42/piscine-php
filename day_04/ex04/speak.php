<?php
session_start();
if (!$_SESSION['logged_on_user'])
{
    echo "ERROR\n";
    exit;
}
date_default_timezone_set('Europe/');
$path_to_file = "../htdocs/private/chat";
if ($_POST['msg'])
{
    $i= 0;
    if(file_exists('../htdocs') === true)
    if(file_exists('../htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $content = file_get_contents($path_to_file);
        $fd = fopen($path_to_file, 'r+');
        flock($fd, LOCK_EX);
        $content = unserialize($content);
        while ($content[$i]['login'])
            $i++;
    }
    $content[$i]['login'] = $_SESSION['logged_on_user'];
    $content[$i]['time'] = time();
    $content[$i]['msg'] = $_POST['msg'];
    $serial = serialize($content);
    if(file_exists('../htdocs') === false)
        mkdir('../htdocs');
    if(file_exists('../htdocs/private') === false)
        mkdir('../htdocs/private');
        file_put_contents($path_to_file, $serial);
        if ($fd)
        {
        flock($fd, LOCK_UN);
        fclose($fd);
        }
}
?>
<html>
<head>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
<form method="post" action="speak.php">
    <input type="textarea" name="msg" id="msg" size="100%" placeholder="Type a message ..."/>
</form>
</body>
</html>