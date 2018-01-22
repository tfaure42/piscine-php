<?php 
$path_to_file = "htdocs/private/products";
if (($_POST['submit'] === 'OK' || $_POST['submit'] === 'Create_product') && $_POST['name'] && $_POST['class'] && $_POST['price'] && $_POST['stock'] && $_POST['info'])
{
    $i= 0;
    if(file_exists('htdocs') === true)
    if(file_exists('htdocs/private') === true)
    if(file_exists($path_to_file) === true)
    {
        $content = file_get_contents($path_to_file);
        $content = unserialize($content);
        while ($content[$i]['name'])
        {
            if ($content[$i]['name'] === $_POST['name'])
            {
                echo "ERROR\n";
                $error = 1;
            }
            $i++;
        }
    }
    if  ($error !== 1)
    {
        $content[$i]['name'] = $_POST['name'];
        $content[$i]['price'] = $_POST['price'];
        $content[$i]['stock'] = $_POST['stock'];
        $content[$i]['info'] = $_POST['info'];
        $class = $_POST['class'];
        $class = explode(',',$_POST['class']);
        for ($x = 0;$class[$x];$x++)
        {
            trim($class[$x]);
            $content[$i]['class'][$x] = $class[$x];
        }
    }
    $serial = serialize($content);
    if(file_exists('htdocs') === false)
        mkdir('htdocs');
    if(file_exists('htdocs/private') === false)
        mkdir('htdocs/private');
        file_put_contents($path_to_file, $serial);
}
header('Location: admin.php');
?>