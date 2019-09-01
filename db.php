<?php
$dsn = 'mysql:host=localhost;dbname=products';
$username = 'admin';
$password = 'admin12345';
$option = [];
try{
    $connection = new PDO($dsn, $username, $password, $option);
}catch(PDOExeption $e){

}
?>
