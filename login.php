<script>
function valido(myForm){
    var email = document.myForm.email.value;
    var password = document.myForm.password.value;
    
    var regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    

    if(email == null || email =""){
        alert("Duhet te plotesohet emeil")
        email.focus;
        return false;
    }
    if(!(regexEmail.test(email))){
        alert("Email duhet te jete ne formen 'user@gmail.com '");
        email.focus;
        return false;
    }
    if(password == null || password =""){
        alert("Duhet te plotesohet password")
        password.focus;
        return false;
    }
    else{
        return true;
    }
}
</script>

<?php 
    session_start();

    require 'dbconnect.php';

    if(isset($_POST['submit'])):
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $pdo->prepare('SELECT id, name, email, password, role from users where email=:email');
        $query->bindParam(':email', $email);
        $query->execute();

        $user = $query->fetch();

        if(count($user)>0 && password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['permission'] = $user['role'];

            header("Location: index.php");
        }else{
            echo "Ke shenuar fjalekalimin gabim! ";
        }

    endif;
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
    .login-form{
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
    .form-footer{
        text-align: center;
    }
    </style>

    <div class="wrap">
        <form class="login-form" name="myForm" action="login.php" onsubmit="return valido(this);" method="post">
            <div class="form-header">
                <h3>Login Form</h3>
                <p>Login to access your dashboard</p>
            </div>
            <div class="form-group">
                <input type="email" class="form-input" name="email" placeholder="email@example.com">
            </div>
            <div class="form-group">
                <input type="password" class="form-input" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <button class="form-button" type="submit" name="submit">Login</button>
            </div>
            <div class="form-footer">
            Don't have an account? <a href="signup.php">Sign Up</a>
            </div>
        </form>
    </div>




