<?

// db options
define('DB_NAME', 'host');
define('DB_USER', 'host');
define('DB_PASSWORD', '112233');
define('DB_HOST', 'localhost');
define('DB_TABLE', 'urls');

// connect to database
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

define('BASE_URL', 'http://host.com/r.php?k=');

?>