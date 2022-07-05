<?php
/*
$username  = 'root';
$password  = 'root';
$result = 0;
try {
	$dbconn = new PDO('mysql:host=localhost;dbname=animacion', $username, $password);
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
}*/

class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=juegos2020;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}