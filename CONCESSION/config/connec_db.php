<?php

// Initialization of variables which save the databases informations
$dbhost = 'localhost';
$dbuser = 'concession';
$dbpass = '7Rehxe8PZ8WYyQNO';
$dbname = 'concession';

// Connection to database
try {
	$dsn = "mysql:host=$dbhost;dbname=$dbname";
	$connect = new PDO($dsn,$dbuser,$dbpass);
} catch (Exception $msg) {
	echo "Echec de connexion au serveur MySQL".$msg->getMessage();
	die();
}

