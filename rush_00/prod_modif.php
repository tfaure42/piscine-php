<?php 
session_start();
$path_to_file = "htdocs/private/products";
if(file_exists('htdocs') === true)
if(file_exists('htdocs/private') === true)
if(file_exists($path_to_file) === true)
{
    $content = file_get_contents($path_to_file);
    $content = unserialize($content);
$i = 0;
while ($content[$i]['name'])
{
    if ($_POST[$i] === 'Apply_changes' || $_POST[$i] === 'Delete')
    $x = $i;
    $i++;
}
if ($_POST[$x] === 'Apply_changes' && $_POST['name'] && $_POST['price'] && $_POST['stock'] && $_POST['class'] && $_POST['info'])
{
    $content[$x]['name'] = $_POST['name'];
    $class = explode(',',$_POST['class']);
    $i = 0;
    for ($y = 0;$class[$y];$y++)
    {
        trim($class[$y]);
        $content[$x]['class'][$i] = $class[$y];
        $i++;
    }
    $content[$x]['stock'] = $_POST['stock'];
    $content[$x]['price'] = $_POST['price'];
    $content[$x]['info'] = $_POST['info'];
    $serial = serialize($content);
    file_put_contents($path_to_file, $serial);
}
if ($_POST[$x] === 'Delete' && $_POST['name'] && $_POST['price'] && $_POST['stock'] && $_POST['class'])
{
    $i = 0;
    $y = 0;
while ($content[$y]['name'])
{
    if ($y == $x)
    $y++;
    if ($content[$y]['name'])
    $new[$i] = $content[$y];
    $y++;
    $i++;
}
$serial = serialize($new);
file_put_contents($path_to_file, $serial);
}
}
header('Location: admin.php');

?>