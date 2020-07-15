<?php 
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=projekti", "root", "");
    }catch(PDOException $pdo){
        die("Lidhja deshtoi");
    }
?>