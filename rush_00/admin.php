<?php
session_start();
if ($_SESSION['admin_logged'])
{
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
        if(file_exists('htdocs/private/passwd') === true)
            {
                $users = file_get_contents('htdocs/private/passwd');
                $users = unserialize($users);
            echo '<h2>Users</h2>';
            $i = 0;
            while ($users[$i]['login'])
            {
                if($users[$i]['admin'] === true){
                    $check = 'true';}
                    else 
                    $check = 'false';
                echo '<form method="post" action="modif.php">
                <input type="text" name="login" id="login" value="'.$users[$i]['login'].'"/>
                <input type="password" name="passwd" id="passwd" placeholder="Change Password"/>
                <input type="text" name="admin" id="admin" value="';
                echo $check;
                echo'">
                <input type="submit" name="'.$i.'" value="Apply changes">
                <input type="submit" name="'.$i.'" value="Delete">
             </form>';
             $i++;
            }
            echo '<br/><form method="post" action="create.php">
            <input type="text" name="login" id="login" placeholder="Login"/>
            <input type="password" name="passwd" id="passwd" placeholder="Password"/>
            <input type="text" name="admin" id="admin" placeholder="true/false">
            <input type="submit" name="submit" value="Create_account"></form>';
        }
        if(file_exists('htdocs/private/products') === true)
        {
            $products = file_get_contents('htdocs/private/products');
            $products = unserialize($products);
            echo '<h2>Products</h2>';
            $i = 0;
            while ($products[$i]['name'])
            {
                $class = implode(',',$products[$i]['class']);
                echo '<form method="post" action="prod_modif.php">
                <input type="text" name="name" id="name" value="'.$products[$i]['name'].'"/>
                <input type="text" name="price" id="price" value="'.$products[$i]['price'].'"/>
                <input type="text" name="stock" id="stock" value="'.$products[$i]['stock'].'">
                <input type="text" name="class" id="class" value="'.$class.'">
                <input type="text" name="info" id="info" value="'.$products[$i]['info'].'"/>
                <input type="submit" name="'.$i.'" value="Apply_changes">
                <input type="submit" name="'.$i.'" value="Delete">
            </form>';
            $i++;
            }
            echo '<form method="post" action="prod_add.php">
            <input type="text" name="name" id="name" placeholder="Name of the product"/>
            <input type="text" name="price" id="price" placeholder="Price"/>
            <input type="text" name="stock" id="stock" placeholder="stock"/>
            <input type="text" name="class" id="class" placeholder="categories ex: categorie1,categorie2,...."/>
            <input type="text" name="info" id="info" placeholder="infos..."/>
            <input type="submit" name="submit" value="Create_product">
            </form>';
            
        }
        
    }
    echo '<a class="text" href="index.php"> retour index</a>'
?>