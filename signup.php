<?php 
    session_start();

    $nameERR = "";
    $emailERR = "";

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }


    require 'dbconnect.php';

    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $nameERR = "Name is required";
        }else{
            $name = test_input($_POST['name']);
            if(!preg_match("/^[a-zA-Z]*$/", $name)){
                $nameERR = "Only letters and white space allowed";
         }
     }

        if(empty($_POST['email'])){
            $emailERR = "EMAIL is required";
        }else{
            $email = test_input($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailERR = "Invalid email format";
        }
    }

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = 'INSERT into users(name, email, password) values (:name, :email, :password)';
        $query = $pdo->prepare($sql);
        $query->bindParam('name', $name);
        $query->bindParam('email', $email);
        $query->bindParam('password', $password);

        if($query->execute()){
            header("Location: login.php");
        }else{
            echo "Regjistrimi deshtoi";
        }

    }
?>




<style>
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
    }
    html{
        height: 100%;
    }
    body{
        font-family: 'Segoe UI', sans-serif;;
        font-size: 1rem;
        line-height: 1.6;
        height: 100%;
    }
    .wrap {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fafafa;
    }
    .signup-form{
        width: 350px;
        margin: 0 auto;
        border: 1px solid #9b9b9b;
        padding: 2rem;
        background: #ffffff;
    }
    .form-input{
        background: #fafafa;
        border: 1px solid #eeeeee;
        padding: 12px;
        width: 100%;
    }
    .form-group{
        margin-bottom: 1rem;
    }
    .form-button{
        background: #69d2e7;
        border: 1px solid #ddd;
        color: #ffffff;
        padding: 10px;
        width: 100%;
        text-transform: uppercase;
    }
    .form-button:hover{
        background: #69c8e7;
    }
    .form-header{
        text-align: center;
        margin-bottom : 2rem;
    }
    
    .error {
        color: #e74c3c;
        }
    </style>

    <div class="wrap">
        <form class="signup-form" name="myForm" action="signup.php"  method="post">
            <div class="form-header">
                <h3>Sign up Form</h3>
                <p>Register here</p>
            </div>
            <div class="form-group">
                <input type="text" class="form-input" name="name" placeholder="Your name" data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" data-validation="required length" data-validation-length="3-20">
            </div>
            <div class="form-group">
                <input type="text" class="form-input" name="email" placeholder="email@example.com" data-validation="required email">
            </div>
            <div class="form-group">
                <input type="password" class="form-input" name="password" placeholder="password" data-validation="length" data-validation-length="min8">
            </div>
            <div class="form-group">
                <button class="form-button" type="submit" name="submit">Register</button>
            </div>
            <span><?php echo $nameERR; ?></span>
            <span><?php echo $emailERR; ?></span>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
		$.validate({
			errorMessageClass: "error",
		});
	</script>


