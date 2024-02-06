<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1517449-monkeys';
    const USER = 'LAA1517449';
    const PASS = 'Pass0107';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
    
    try {
        $pdo = new PDO($connect, USER, PASS);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>