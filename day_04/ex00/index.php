<?php
session_start();
if ($_GET['login'] && $_GET['submit'] === "OK")
   $_SESSION['login'] = $_GET['login'];
if ($_GET['passwd'] && $_GET['submit'] === "OK")
$_SESSION['passwd'] = $_GET['passwd'];
?>
<html>
<body>
<form method="get" action="index.php">
   <label>Enter Login :</label><input type="text" name="login" id="login" placeholder="Login" value="<?php echo $_SESSION['login'];?>"/><br />
   <label>Enter Password :</label><input type="password" name="passwd" id="passwd" placeholder="Password" value="<?php echo $_SESSION['passwd'];?>"/>
   <input type="submit" name="submit" value="OK">
</form>
</body>
</html>