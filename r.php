<?php
if(!isset($_GET['k'])) die('Нет необходимых параметров.');

include 'sql.php';
include 'base62.php';

$db = new SafeMySQL();

$key = $_GET['k'];
$id = Base62::Decode($key);

$sql  = 'SELECT `url` FROM `urls` WHERE `id` = '.$id.' LIMIT 1';
$item = $db->getRow($sql);

if(empty($item)){
    die('Нет такого URL.');
} else {
    Header('HTTP/1.1 301 Moved Permanetly');
    Header('Location: ' . $item['url']);
}

?>