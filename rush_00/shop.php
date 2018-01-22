<?php
session_start();
$path_to_file = 'htdocs/private/products';
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $content = file_get_contents($path_to_file);
        $content = unserialize($content);
        $y = 0;
        $i = 0;
        while ($content[$i]['name'])
        {
            $class = $content[$i]['class'];
            for ($x = 0;$class[$x];$x++)
            {
                if ($y === 0)
                {
                    $all_categories[$y] = $class[$x];
                    $y++;
                }
                if (array_search($class[$x], $all_categories) === false)
                {$all_categories[$y] = $class[$x];
                $y++;}
            }
            $i++;
        }
    }
    $y--;
    while ($all_categories[$y])
    {
        ?>
         <head>
           <meta charset="UTF-8">
           <link rel="stylesheet" href="shop.css">
           <title>Boutique</title>
         </head>
         <body>
         <div class="case"><h1><center><br /><a class="text">
         <?php echo $all_categories[$y];?></a></h1></center><?php
         $i = 0;
         while ($content[$i]['name'])
         {
           if (array_search($all_categories[$y], $content[$i]['class']) !== false)
           {
             echo "<center>"."<a class=text>".$content[$i]['name']."<br/>".$content[$i]['price']."$<br/>".$content[$i]['info'].'<br/>
             <form method="post" action="cart_add.php"><br /><input type="submit" name="add_to_cart" value="'.$content[$i]['name'].'">
             </form></a></center>';
           }
           $i++;
         }
         ?>
         </div><br/></body>
         <?php
         $y--;
       }
       ?>
       <a class="text" href="index.php"> retour index</a></br>