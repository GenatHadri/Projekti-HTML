

<?php 
    $nameERR = "";
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }

    require 'dbconnect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "SELECT * from users where id =:id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);
    $user = $query->fetch(); 

        if(isset($_POST['submit'])){ 
         if(empty($_POST['name'])){
        $nameERR = "Emri nuk ben te jete i zbrazet";
        }else{
            $name = test_input($_POST['name']);
        }
        $email = $_POST['email'];
        
    
        $sql = "UPDATE users SET name = :name, email =:email where id=:id";
        $query = $pdo->prepare($sql);
        $query->bindParam('name', $name);
        $query->bindParam('email', $email);
        $query->bindParam('id', $id);

        $query->execute(); 
        header("Location: admin.php");
    }
    


?>

<style>
    *{
        background: #fafafa;
        box-sizing: border-box;
    }
    .container{
        margin: 0 auto;
        height: auto;
        width: 50%;
        border: 1px solid blue;
        text-align: center;
    }
     input[type=submit]{
        margin-top: 3%;
    }
    input{
        border: 1px solid blue;
    }
    
    h2{
        color: blue;
        text-decoration:underline;
    }
</style>

<div class="container">
    <h2>Edit users</h2>
    <form method="POST">
    EMRI:<br>
    <input type="text" name="name" value= "<?php echo $user['name']?>"><br>
    EMAIL:<br>
    <input type="email" name="email" value= "<?php echo $user['email']?>"><br>
    <input type="submit" name="submit" value="Ndrysho"><br>
    </form>
</div>