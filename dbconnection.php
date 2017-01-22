<?php

   $dsn = 'mysql:dbname=yourDataBaseName;host=127.0.0.1';
    $user = 'root';
    $password = '';
    
    
    
// using PDO CLASS
try
{
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $dbh->exec("set names utf8");
} 
catch (PDOException $e) 
{
    echo 'Connection failed: ' . $e->getMessage();
}

?>
