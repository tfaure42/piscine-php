<?php
session_start();
if(file_exists('htdocs') === false)
header('Location: install.php');
if(file_exists('htdocs/private') === false)
header('Location: install.php');
if(file_exists('htdocs/private/carts') === false)
header('Location: install.php');
if(file_exists('htdocs/private/passwd') === false)
header('Location: install.php');
if(file_exists('htdocs/private/products') === false)
header('Location: install.php');
if ($_SESSION['admin_logged'])
{
?>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="shop.css">
  <title>Boutique Admin</title>
</head>
<div class="body_element">
  <body>
    <form method="post" action="create.php">
      <div><center>
        <br />
        <br />
        <label><a class="text">Login : </a></label><input class="input" type="text" name="login" id="login" placeholder=" Login"/>
        <input type="submit" name="submit" value="SignUp">
        <br />
        <br />
        <label><a class="text">Password : </a></label><input class="input" type="password" name="passwd" id="passwd" placeholder=" Password"/>
        <input type="submit" name="submit" value="Login">
        <br />
        <br />
      </center></div>
    </form>
      <div><center>
        <a href="admin.php" class="text">Admin page</a>
        <br />
        <br />
        <a href="shop.php" class="text">Shop</a>
        <br />
        <br />
        <a href="cart.php" class="text">Mon Panier</a>
        <br />
        <br />
        <a href="logout.php" class="text">Logout</a>
      </div></center>
      <div class="background-img1">
        <div>
          <a href="shop.php"><img class="img1" src="img/cart.png"></a>
        </div>
      </div>
    </div>
  </body>
</div>
</html>
<?php
}
if (!$_SESSION['admin_logged'])
{
    ?>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="shop.css">
  <title>Boutique</title>
</head>
<div class="body_element">
  <body>
    <form method="post" action="create.php">
      <div><center>
        <br />
        <br />
        <label><a class="text">Login : </a></label><input class="input" type="text" name="login" id="login" placeholder=" Login"/>
        <input type="submit" name="submit" value="SignUp">
        <br />
        <br />
        <label><a class="text">Password : </a></label><input class="input" type="password" name="passwd" id="passwd" placeholder=" Password"/>
        <input type="submit" name="submit" value="Login">
        <br />
        <br />
        <br />
        <br />
        <a href="shop.php" class="text">Shop</a></br>
        <br />
        <a href="cart.php" class="text">Mon Panier</a></br>
        <br />
        <a href="logout.php" class="text">Logout</a></br>
      </form>
    </center>
      </div>
      <div class="background-img1">
      <div>
        <a href="shop.php"><img class="img1" src="img/cart.png"></a>
      </div>
      </div>
  </body>
</div>
<?php
}
?>
