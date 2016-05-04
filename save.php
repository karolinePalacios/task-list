<?php
define('CONN_SERVER', "localhost");
define('CONN_USER', "user");
define('CONN_PASSWD', "password");
define('CONN_DB', "database");
define('CONN_PORT', "3306");

function pdo( $_PROCEDURE, $_BIND = array() ) {
	try {
		$_PDO = new PDO('mysql:dbname='.CONN_DB.';host='.CONN_SERVER.';port='.CONN_PORT, CONN_USER, CONN_PASSWD);
		$_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$_STMT = $_PDO->prepare($_PROCEDURE);
		if(!empty($_BIND)){
			$_STMT->execute($_BIND);
		}
		else {
			$_STMT->execute();
		}
		if (strpos($_PROCEDURE, 'SELECT') !== false) {
			$_COUNT = $_STMT->rowCount();
			$_STMT->setFetchMode(PDO::FETCH_ASSOC);
			if (strpos($_PROCEDURE, 'LIMIT 1;') !== false) {
				return $_STMT->fetch();
			}
			else {
				return $_STMT->fetchAll();
			}
		}
		else {
			return true;	
		}
		$_PDO = null;
	}
	catch(PDOException $e) {
		die($e->getMessage());
	}
}

if(isset($_POST) && !empty($_POST['list'])){
	pdo("UPDATE `listManager` SET `text` = ? WHERE `id` = ?;", array($_POST['list'], 1));
}
?>