<style>
        *{            
            box-sizing: border-box;
            background: #fafafa;
        }
        .posts, .cities, .customers{
            margin: 1% auto;
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

<?php 
session_start();


    if($_SESSION['permission'] == 1){

    

require "dbconnect.php";

?>
<h1 style="text-align:center;">Admin Dashboard</h1>
<!--<a href="index.php">Main Page</a>-->
<button style="cursor:pointer;" onclick="window.location.href='index.php'">Main Page</button>


<hr>

<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<?php 
$titleERR = "";

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}

        
    if(isset($_POST['submit'])){
    $icon = $_POST['icon'];
    if(empty($_POST['title'])){
        $titleERR = "Titulli nuk ben te jete i zbrazet";
    }else{
        $title = test_input($_POST['title']);
    }
    $body = $_POST['body'];
    $author = $_POST['author'];
    

    $sql = 'INSERT into postimet (icon, title, body, author) values (:icon, :title, :body, :author)';
    $query = $pdo->prepare($sql);
    $query->bindParam('icon', $icon);
    $query->bindParam('title', $title);
    $query->bindParam('body', $body);
    $query->bindParam('author', $author);

    $query->execute();
        
        header("Location: index.php");
}
    ?>
    
    
    <div class="posts">
        <h2>Shto postime</h2>
        <form name="myForm" action="admin.php"  method="post">
        <label>Icona</label><br>
        <input type="text" name="icon"><br>
        <label>Titulli</label><br>
        <input type="text" name="title"><br>
        <span><?php echo $titleERR; ?></span><br>
        <textarea name="body" rows="4" cols="20">Permbajtja... </textarea><br>
        <input type="hidden" name="author" value="<?php echo $_SESSION['name']; ?>">
        <input type="submit" name="submit" value="Shto">
        </form>
    </div>

<hr>

<!------------------------------------------------------------------------------------------------------------------------------------------------------>

<?php 

if(isset($_POST['submit'])){
    $photo = $_POST['photo'];
    if(empty($_POST['title'])){
        $titleERR = "Titulli nuk ben te jete i zbrazet";
    }else{
        $title = test_input($_POST['title']);
    }
    $text1 = $_POST['text1'];
    $text2 = $_POST['text2'];
    $twitter = $_POST['twitter'];
    $author = $_POST['author'];
    

    $sql = 'INSERT into qytetet (photo, title, text1, text2, twitter, author) values (:photo, :title, :text1, :text2, :twitter, :author)';
    $query = $pdo->prepare($sql);
    $query->bindParam('photo', $photo);
    $query->bindParam('title', $title);
    $query->bindParam('text1', $text1);
    $query->bindParam('text2', $text2);
    $query->bindParam('twitter', $twitter);
    $query->bindParam('author', $author);

    $query->execute();
        
        header("Location: index.php");
}

?>


<div class="cities">
        <h2>Shto qytetet</h2>
        <form name="myForm" action="admin.php"  method="post">
        <label>Foto e qytetit</label><br>    
        <input type="text" name="photo"><br>
        <label>Titulli</label><br>  
        <input type="text" name="title"><br>
        <span><?php echo $titleERR; ?></span><br>  
        <label>Pershkrimi i pare</label><br>  
        <input type="text" name="text1"><br>
        <label>Pershkrimi i dyte</label><br>  
        <input type="text" name="text2"><br>
        <label>Adresa ne twitter</label><br>  
        <input type="text" name="twitter"><br>
        <input type="hidden" name="author" value="<?php echo $_SESSION['name']; ?>">
        <input type="submit" name="submit" value="Shto">
        </form>
</div>

<hr>

<!------------------------------------------------------------------------------------------------------------------------------------------------------>

<?php 

if(isset($_POST['submit'])){
    $body = $_POST['body'];
    $photo = $_POST['photo'];
    $personi = $_POST['personi'];
    $author = $_POST['author'];
    

    $sql = 'INSERT into customers (body, photo, personi, author) values (:body, :photo, :personi, :author)';
    $query = $pdo->prepare($sql);
    $query->bindParam('body', $body);
    $query->bindParam('photo', $photo);
    $query->bindParam('personi', $personi);
    $query->bindParam('author', $author);

    $query->execute();
        
        header("Location: index.php");
}

?>

<div class="customers">
        <h2>Shto konsumatoret</h2>
        <form name="myForm" action="admin.php"  method="post">  <br>
        <textarea name="body" rows="4" cols="20">Permbajtja... </textarea><br>
        <br><label>Fotoja</label><br>
        <input type="text" name="photo"><br>
        <label>Personi</label><br>
        <input type="text" name="personi"><br>
        <input type="hidden" name="author" value="<?php echo $_SESSION['name']; ?>">
        <input type="submit" name="submit" value="Shto">
        </form>
</div>

<hr>

<!------------------------------------------------------------------------------------------------------------------------------------------------------>


<?php 

    $query = $pdo->query('SELECT * from users');
    $users = $query->fetchALL();
?>

<style>
    .container, .container1{
            margin: 1% auto;
            height: auto;
            width: 80%;
            border: 1px solid blue;
            text-align: center;
            padding-bottom: 3%;
    }
    
    a{
        text-decoration: none;
        color: red;
    }
</style>

<div class="container">
    <h2>Userat</h2>
    <table align="center" border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['password'] ?></td>
                <td><?php echo $user['role'] ?></td>
                <td><a href="edit.php?id=<?php echo $user['id']; ?>" style="color: blue;">EDIT</a></td>
                <td><a href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete?')">DELETE</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<hr>

<!------------------------------------------------------------------------------------------------------------------------------------------------------>

<?php 

    $queryy = $pdo->query('SELECT * from contact');
    $contact = $queryy->fetchALL();
?>
<div class="container1">
    <h2>Feedbacks</h2>
    <table align="center" border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Happy</th>
            <th>Koment</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($contact as $user1): ?>
            <tr>
                <td><?php echo $user1['emri'] ?></td>
                <td><?php echo $user1['mbiemri'] ?></td>
                <td><?php echo $user1['email'] ?></td>
                <td><?php echo $user1['happy'] ?></td>
                <td><?php echo $user1['koment'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



        <?php }else{ ?>
            <script>
                alert('Nuk jeni admin');
            </script>
        <?php $sec = "1";
        header("Refresh: $sec; url=index.php"); } 
         ?> 
