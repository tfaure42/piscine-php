<?php
session_start();
$path_to_file = 'htdocs/private/carts';
    $user = $_SESSION['logged_on_user'];
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $carts = file_get_contents($path_to_file);
        $carts = unserialize($carts);
        $products = file_get_contents('htdocs/private/products');
        $products = unserialize($products);
        $y = 0;
        $i = 0;
    if ($user)
    {
        while ($products[$i]['name'])
    {
        if ($carts[$user]['qty'][$i] > 0)
        {
            ?>
            <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="shop.css">
                <title>Boutique</title>
              </head>
  <div class="case"><h1><center><br /><a class="text">
        <?php echo $products[$i]['name'];?></a></h1></center><?php
                    echo "<center>"."<a class=text>"."price = ".$carts[$user]['products'][$i]."$<br/> quantity = ".$carts[$user]['qty'][$i]."<br/> Total Produits = ".$carts[$user]['amount'][$i].'$<br/>
                    <form method="post" action="cart_add.php"> <input type="submit" name="add_to_cart" value="'.$products[$i]['name'].'">
                    </form></a></center></br>';              
        ?>
        </div><br/>
        <?php
        }
        $i++;
    }
    echo "<h1><a class='text'>Total = ".$carts[$user]['total']."</a></h1>";
    echo '<a class="text" href="index.php"> retour index</a>';
    }
    else if ($_SESSION['unlogged_cart'] == 'n_empty') 
    {
    while ($products[$i]['name'])
    {
        if ($_SESSION['qty'][$i] >=0)
        {
        ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="shop.css">
    <title>Boutique</title>
  </head>
        <div><h1>
        <?php echo $products[$i]['name'];?></h1><?php
                    echo "<center>"."<a class=text>"."price = ".$_SESSION['products'][$i]."$<br/> quantity = ".$_SESSION['qty'][$i]."<br/> Total Produits = ".$_SESSION['amount'][$i].'$<br/>
                    <form method="post" action="cart_add.php"> <input type="submit" name="add_to_cart" value="'.$products[$i]['name'].'">
                    </form></a></center></br>';
        ?>
        </div><br/>
        <?php
        }
        $i++;
    }
    echo "<h1>Total = ".$_SESSION['total']."</h1>";
    echo '<a class="text" href="index.php"> retour index</a>';
    }
    else
    {
    ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="shop.css">
        <title>Boutique</title>
      </head>
      <body>
          <div class="case"><a class="text">Empty Cart</a></div>
          <a class="text" href="index.php"> retour index</a>
    </body>
    <?php
    }
    }
?>