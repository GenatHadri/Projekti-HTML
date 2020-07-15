<?php 
//session_start();

require 'dbconnect.php';



    if(isset($_POST['submit'])){
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $happy = $_POST['happy'];  
    $koment = $_POST['koment'];
    
    

    $sql = 'INSERT into contact(emri, mbiemri, email, happy, koment) values (:emri, :mbiemri, :email, :happy, :koment)';
    $query = $pdo->prepare($sql);
    $query->bindParam('emri', $emri);
    $query->bindParam('mbiemri', $mbiemri);
    $query->bindParam('email', $email);
    $query->bindParam('happy', $happy);
    $query->bindParam('koment', $koment);
    

    $query->execute();
        
        header("Location: index.php");
}
    ?>


