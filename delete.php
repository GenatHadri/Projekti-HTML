<?php 
      require "dbconnect.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "DELETE FROM users WHERE id= :id";
    $query = $pdo->prepare($sql);

    $query->execute(['id' => $id]);

    header("Location: admin.php");

?>
