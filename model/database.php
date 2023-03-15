<?php 
    $dsn = "yjo6uubt3u5c16az.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $username = 'ibm4f4d2dhzrln9g';
    $password = 'qcqq3jh0jfate9vk';

    try{
        $db = new PDO($dsn, $username, $password);
    } catch(PDOException $e){
        $error = "Database Error! " . $e->getMessage();
        include('view/error.php');
        exit(); 
    }
?>
