<?php
	if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys")
    {
        $file = base64_encode(file_get_contents("../img/42.png"));
        echo "<html><body>
        Bonjour Zaz<br />
        <img src='data:image/png;base64,";
        $file = base64_encode(file_get_contents("../img/42.png"));
        echo $file;
        echo "'> </body></html>";
    }
    else
    {
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	header('HTTP/1.0 401 Unauthorized');
    echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}
?>
