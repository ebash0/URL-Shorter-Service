<?php
if(!isset($_GET['k'])) die('��� ����������� ����������.');
	
	include 'config.php';
	include 'base62.php';
	
	$key = $_GET['k'];
	$id = Base62::Decode($key);
	
	$sql  = 'SELECT `url` FROM `urls` WHERE `id` = '.$id.' LIMIT 1';
	$result = mysql_query($sql);
	
if(!$result || mysql_num_rows($result) == 0) die('��� ������ URL.');
	
	$result = mysql_fetch_assoc($result);
	
	Header('HTTP/1.1 301 Moved Permanetly');
	Header('Location: ' . $result['url']);
?>