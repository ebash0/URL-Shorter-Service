<?php
ini_set('display_errors', 0);

if(isset($_GET['longurl'])){
	$long_url = $_GET['longurl'];
	
	if(filter_var($long_url, FILTER_VALIDATE_URL)){
		
		require ("config.php");
		include 'base62.php';
		
		$result = mysql_query('SELECT id FROM ' . DB_TABLE. ' WHERE url="' . mysql_real_escape_string($long_url) . '" LIMIT 1');
		$array = mysql_fetch_assoc($result);
		
		$already_shortened = mysql_result($result, 0, 0);
		if(!empty($already_shortened))
		{
			echo BASE_URL . Base62::Encode($array['id']);
		}
		else
		{
			mysql_query('INSERT INTO ' . DB_TABLE . ' (url) VALUES ("' . mysql_real_escape_string($long_url) . '")');
			
			echo BASE_URL . Base62::Encode(mysql_insert_id());
		}
		
	} else {
		echo "Неправильный URL адрес.";
	}
}

?>