<?php 
    session_start();
?> 
            <nav>
                <div class="row">
                    <img src="resources/img/logo-white.png" style="border-radius: 50px" alt="Take and Eat logo" class="logo">   
                    <img src="resources/img/logo.png" alt="Take and Eat logo" class="logo-black">   
                    <ul class="main-nav js--main-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#features">About us</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <?php if(isset($_SESSION['name'])):?>
                        <script>
                            alert('Mire se vini <?php echo ($_SESSION['name']); ?>' )
                        </script>
                             <li><a href="admin.php">Admin</a></li>
                             <li><a href="logout.php">Logout</a></li>
                        
                        <?php else: ?>
                        <li><a href="login.php">Log in</a></li>
                        <?php endif; ?>
                        
                    </ul>
                        <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
                </div>
            </nav>