<?php
ini_set('display_errors', 0);
define('BASE_URL', 'http://host.com/');

if(isset($_GET['longurl'])) {
    $long_url = $_GET['longurl'];

    if (filter_var($long_url, FILTER_VALIDATE_URL)) {

        include 'sql.php';
        include 'base62.php';

        $db = new SafeMySQL();
        $sql = 'SELECT id FROM `urls` WHERE url= ?s LIMIT 1';
        $item = $db->getRow($sql, $long_url);

        if (!empty($item)) {
            echo BASE_URL . Base62::Encode($item['id']);
        } else {
            $sql = 'INSERT INTO `urls` SET ?u';
            $db->query($sql, array('url' => $long_url));

            echo BASE_URL . Base62::Encode($db->insertId());
        }

    } else {
        echo "Неправильный URL адрес.";
    }
}

?>