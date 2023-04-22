<?php
require_once '../config.php';
try {
    $dsn = "mysql:host=".SERVIDOR.";dbname=".DBNAME.";charset=utf8";
    $dbh = new PDO($dsn, USER, PASSW);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS clickadsenses(
  	id_cd int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  	ip varchar(50) NOT NULL,
  	pais varchar(50) NOT NULL,
  	click int(11) DEFAULT NULL,
  	url  varchar(150) NOT NULL,
  	fecha varchar(50) DEFAULT NULL,
  	hora varchar(15) DEFAULT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1";
    $dbh->exec($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}
