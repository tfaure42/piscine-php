<?php
include "newcart.php";
if(file_exists('htdocs') === false)
mkdir('htdocs');
if(file_exists('htdocs/private') === false)
mkdir('htdocs/private');
    $account[0]['login'] = tfaure;
    $account[0]['passwd'] = hash("sha256", 'abcd');
    newcart('tfaure');
    $account[0]['admin'] = true;
    $serial = serialize($account);
        file_put_contents('htdocs/private/passwd', $serial);

        $path_to_file = "htdocs/private/products";
            $content[0]['name'] = "Maison";
            $content[0]['price'] = 10000000;
            $content[0]['stock'] = '1';
            $content[0]['info'] = "WOW c'est une Maison !";
            $class = "Maison,Logement";
            $class = explode(',', $class);
            for ($x = 0;$class[$x];$x++)
            {
                trim($class[$x]);
                $content[0]['class'][$x] = $class[$x];
            }
            $content[1]['name'] = "Appartement";
            $content[1]['price'] = "5111112";
            $content[1]['stock'] = '2';
            $content[1]['info'] = "WOW c'est un Appartement !";
            $class = "Appartement,Logement";
            $class = explode(',', $class);
            for ($x = 0;$class[$x];$x++)
            {
                trim($class[$x]);
                $content[1]['class'][$x] = $class[$x];
            }
            $content[2]['name'] = "Phonne8";
            $content[2]['price'] = "798.98";
            $content[2]['stock'] = '96';
            $content[2]['info'] = "Tellephone de la marque Pomme";
            $class = "Tellephone,Accessoire";
            $class = explode(',', $class);
            for ($x = 0;$class[$x];$x++)
            {
                trim($class[$x]);
                $content[2]['class'][$x] = $class[$x];
            }
            $content[3]['name'] = "Brosse à cheveux";
            $content[3]['price'] = "10";
            $content[3]['stock'] = '30';
            $content[3]['info'] = "Pratique pour les personnes qui possedent des cheuveux!";
            $class = "Accessoire";
            $class = explode(',', $class);
            for ($x = 0;$class[$x];$x++)
            {
                trim($class[$x]);
                $content[3]['class'][$x] = $class[$x];
            }
            $serial = serialize($content);
            file_put_contents($path_to_file, $serial);
            header('Location: http://e3r13p1.42.fr:8080/rush_00/');
?>