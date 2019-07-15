<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=php-basic-cms","root","");
}catch(PDOException $e){
    exit('Database error.');
}