<?php
include 'auth.php';
session_start();
if ($_POST['login'] && $_POST['passwd'])
{
    if (auth($_POST['login'], $_POST['passwd']) == true)
        {
            $_SESSION['logged_on_user'] = $_POST['login'];
            ?>
            <iframe src="chat.php" width="100%" name="chat" height="550"></iframe><br/>
                <iframe src="speak.php" width="100%" height="50"></iframe>
            <?php
        }
    else
    {
        $_SESSION['logged_on_user'] = '';
        echo "ERROR\n";
    }
}
else
{
    echo "ERROR\n";
}
?>