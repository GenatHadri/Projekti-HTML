<!DOCTYPE html>
<html lang="sq">

    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Take and Eat is a premium food delivery service with the mission to bring affordable and healthy meals to as many people as possible.">
        
       
<!--        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">-->
<!--        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">-->
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        <title>Take and Eat</title>
        
        
    
    </head>


    <body>
        <header>
            <?php 
            include 'header.php';
            ?>
            <div class="hero-text-box" id="home">
                <h1>Welcome in our Fast Food</h1>
                <a class="btn btn-full js--scroll-to-meals" href="#">Jam i uritur</a>
                <a class="btn btn-ghost js--scroll-to-start" href="#">Me shume</a>
            
            
            </div>
        
        
        </header>   

        
        <section class="section-features js--section-features" id="features">
            <div class="row">
                <h2>Rreth nesh</h2>
                <p class="long-copy">
                Duke pare qe njerezit gjithnje e me pak kane kohe qe te gatuajne ne kemi sjellur platformen tone per porositje te ushqimit
                </p>
            
            </div> 
            
            <?php 
                require 'dbconnect.php';

                $query = $pdo->query('SELECT * from postimet');
                $postimet = $query->fetchAll();
            
            ?>
            
            <div class="row">
    
            <?php foreach($postimet as $posts): ?>
                <div class="col span-1-of-4 box">
                    <i class ="<?php echo $posts['icon']; ?> icon-big"></i>
                    <h3><?php echo $posts['title']; ?></h3>
                    <p><?php echo $posts['body']; ?></p>
                </div>
            <?php endforeach; ?>
            </div>
            
            

<!--
            <div class="row js--wp-1">
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-infinite-outline icon-big"></i>
                    <h3>365 dite ti vitit</h3>
                    <p>Ne jemi ne dispozicionin tuaj gjate gjithe vitit. Nuk keni nevoje fare te gatuani. Mjafton vetem nje thirrje dhe jemi te dera e juaj</p>                
                </div>
                
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-stopwatch-outline icon-big"></i>
                    <h3>Gati per 15 minuta</h3>
                    <p>Jeni 15 minuta larg shijes me te mire qe keni provuar te pergatitur nga shefat me te mire ne vend</p>                
                </div>
                
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-nutrition-outline icon-big"></i>
                    <h3>100% natyrale</h3>
                    <p>Produktet tona jone gjithmone te fresketa. Te mrekullueshme per shendetin tuaj!</p>                
                </div>
                
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-cart-outline icon-big"></i>
                    <h3>Porositni cdo gje</h3>
                    <p>Ne nuk ju kufizojme per asnje ushqim gjithmone mund te porositni se cfare te doni dhe nga te doni</p>                
                </div>          
            </div>
-->
        </section>
        
        

        
<!--
        
         <section class="section-register" id="login">
            <div class="row">
                <h2>Log in dhe Register</h2>
            </div>
            <div class="container">
                <div class="link-container">
                    <a id="firstA" href="#" onclick="changeForm(0)">Login</a>
                    <a href="#" onclick="changeForm(1)">Register</a>
                </div>
                  <form id="mainForm" action="" method="post">
                <div class="login forms form-style">
                      <label for="">Username:</label>
                      <input type="email" name="email" class="input" placeholder="username..." />
                      <label for="">Password:</label>
                      <input type="password" name="password" class="input" placeholder="password..." data-validation="length" data-validation-length="min8"/>
                      <input
                        id="submit"
                        type="submit"
                        name="submit"     
                        class="input submit"
                        value="Login"
                        onclick="validate(0)"
                      />
                </div>
                    </form>
                <form id="mainForm" action="" method="post">
                
                <div class="register forms hidden">
                  <label for="">Name:</label>
                  <input type="text" name="name" class="input" placeholder="username..." data-validation="length" data-validation-length="3-20"/>
                  <label for="">Email:</label>
                  <input type="email" name="email" class="input" placeholder="email..."/>
                  <label for="">Password:</label>
                  <input type="password" name="password" class="input" placeholder="password..." data-validation="length" data-validation-length="min8"/>
                  <input
                    id="submit1"
                    type="submit"
                    name="submit"
                    class="input submit"
                    value="Login"
                    onclick="validate(1)"
                  />
                </div>
                    </form>
               
             </div>
            
            <script>
            function changeForm(form) {
                let forms = document.querySelectorAll("form>div");
                if (form == 0) {
                    forms[0].classList.remove("hidden");
                    forms[0].classList.add("form-style");
                    forms[1].classList.add("hidden");
                    forms[1].classList.remove("form-style");
                } else {
                    forms[1].classList.remove("hidden");
                    forms[1].classList.add("form-style");
                    forms[0].classList.add("hidden");
                    forms[0].classList.remove("form-style");
                }
            }

            function validate(form) {
                let inputs = document.querySelectorAll("input");
                if (form == 0 && inputs[0].value == "" || inputs[1].value == "") {
                    alert("nuk keni mbushur te dhenat");
                } else if (form == 1 && inputs[3].value == "" || inputs[4].value == "" || inputs[5].value == "") {
                    alert("nuk mund te regjistroheni nese nuk keni mbushur te dhenat");
                }
            }
             </script>
             
             <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
            <script>
              $.validate({
                lang: '#registration'
              });
            </script>
        </section>
        
        
    
-->
    
        
        <section class="section-meals js--section-meals" id="meals">
            <ul class="meals-showcase clearfix">
                
                <?php 
//                    require 'dbconnect.php';
//
//                    $queryy = $pdo->query('SELECT * from meal-photos');
//                    $fotot = $queryy->fetchAll();
                ?>
                
                <?php // foreach($fotot as $photos): ?>
<!--
                <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/<?php // echo $photos['image'];?>.jpg" >       
                    </figure>     
                </li>
-->
                <?php // endforeach; ?>    
                
                
                <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/1.jpg" alt="hamburger">       
                    </figure>     
                </li>
                 <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/2.jpg" alt="sandwich">       
                    </figure>     
                </li>
                 <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/3.jpg" alt="pomfrita">       
                    </figure>     
                </li>
                 <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/4.jpg" alt="sufllaqe">       
                    </figure>     
                </li>

            </ul>
        <ul class="meals-showcase clearfix">
                <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/5.jpg" alt="pica">       
                    </figure>     
                </li>
                 <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/6.jpg" alt="rolls">       
                    </figure>     
                </li>
                 <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/7.jpg" alt="tacos">       
                    </figure>     
                </li>
                 <li>    
                    <figure class="meal-photo">
                        <img src="resources/img/8.jpg" alt="hot dog">       
                    </figure>     
                </li>
            </ul>
        
        
        </section>
        

            
        
        <section class="section-cities" id="cities">
            <div class="row">
                <h2>Jemi ne keto qytete</h2>
            </div>
            <?php 
//                require 'dbconnect.php';

//                $queryyy = $pdo->query('SELECT * from meal-photos');
//                $qytetet = $queryyy->fetchAll();
            ?>
<!--          <div class="row">-->
            <?php //foreach($qytetet as $city): ?>
<!--
                <div class="col span-1-of-4 box">
                    <img src="resources/img/<?php// echo $qytete['photo'];?>.jpg">
                    <h3><?php //echo $city['title']; ?></h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        <span><?php// echo $city['text1'];?></span>
                    </div>
                    <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        <span><?php //echo $city['text2'];?></span>
                    </div>
                    <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#"><?php //echo $city['twitter'];?></a>
                    </div>
                </div>
-->
            <?php // endforeach; ?>
<!--            </div>-->
            
            <div class="row">
                <div class="col span-1-of-4 box">
                    <img src="resources/img/prishtina.jpg" alt="Prishtine">
                    <h3>Prishtine</h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        <span> 1300+ porosi</span>
                    </div>
                     <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        <span> 5 top chefs </span>
                    </div>
                     <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#">@takeandeat_prishtine</a>
                    </div>
                </div>
                 <div class="col span-1-of-4 box">
                    <img src="resources/img/gjakova.jpg" alt="Gjakove">
                    <h3>Gjakove</h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        800+ porosi
                    </div>
                     <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        2 top chefs
                    </div>
                     <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#">@takeandeat_gjakove</a>
                    </div>
                </div>
                 <div class="col span-1-of-4 box">
                    <img src="resources/img/prizren.jpg" alt="Prizren">
                    <h3>Prizren</h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        1100+ porosi
                    </div>
                     <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        4 top chefs
                    </div>
                     <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#">@takeandeat_prizren</a>
                    </div>
                </div>
                 <div class="col span-1-of-4 box">
                    <img src="resources/img/gjilan.jpg" alt="Gjilan">
                    <h3>Gjilan</h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        700+ porosi
                    </div>
                     <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        3 top chefs
                    </div>
                     <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#">@takeandeat_gjilan</a>
                    </div>
                </div>
            </div>
            
        </section>
        
             
        
        
    <section class="section-testimonials js--section-testimonials ">
            <div class="row">
                <h2>Disa nga konsumatoret tane</h2>
            </div>
        
        <?php 
        $queryyyy = $pdo->query('SELECT * from customers');
        $customers = $queryyyy->fetchAll();
        ?>
        
        <div class="row">
            <?php foreach($customers as $cite): ?>
            <div class="col span-1-of-4">
                <blockquote>
                    <?php echo $cite['body']; ?>
                    <cite><img src="resources/img/<?php echo $cite['photo'];?>"><span><?php echo $cite['personi'];?></span></cite>                
                </blockquote>
            </div>
            <?php endforeach; ?>
        </div>
<!--
            <div class="row">
                <div class="col span-1-of-4">
                    <blockquote>
                        Take and Eat per mua edhe zgjedhja e jetes. Eshte nje shpetues per te gjithe jo vetem per cilisine qe e ofron ne ushqimet e saj por edhe per shpejtesine e arritjes se porosise
                        <cite><img src="resources/img/Adea%20Berisha.jpeg" alt="Costumer 1"><span>Adea Berisha</span></cite>
                    </blockquote>
                </div>
                  <div class="col span-1-of-4">
                    <blockquote>
                        Gjate gjithe jetes kam provuar lloj e lloj ushqimesh te ndryshme ne vende te llojllojshme per asnjeri nuk i afrohet Take and Eat-it. Familja ime jemi ne dashuri me kete fast food
                        <cite><img src="resources/img/Dion%20Kusari.jpg" alt="Costumer 2"><span>Dion Kusari</span></cite>
                    </blockquote>
                </div>
                  <div class="col span-1-of-4">
                    <blockquote>
                        Jam me te vertete i mahnitur nga mirepritja e stafit qe te behet kur futesh aty. Te gjithe jane miqesor. Ne vendin tim ka mjaft fast food-e dhe restaurante por un zgjedhjen e kam bere
                        <cite><img src="resources/img/Leart%20Hoxha.jpg" alt="Costumer 3"><span>Leart Hoxha</span></cite>
                    </blockquote>
                </div>
                <div class="col span-1-of-4">
                    <blockquote>
                        Kam qene ne kerkim te diqkaje te tille. Une punoj ne organizata te ndryshme dhe nuk kam mjaftueshem kohe per te pergatitur ushqim. Ky vend me ka shpetuar jeten
                        <cite><img src="resources/img/vlera%20godeni.jpg" alt="Costumer 4"><span>Vlera Godeni</span></cite>
                    </blockquote>
                </div>
            </div>
-->
        </section>
        
<!--

        <section class="slider">
            <div class="fling-minislide">
            <img src="resources/img/oferta1.jpg" alt="Slide 3" />
            <img src="resources/img/oferta2.jpg" alt="Slide 2" />
            <img src="resources/img/oferta3.jpg" alt="Slide 1" />
  
            </div>
            
            <style>
                
                .slider{
                    padding-top: 2%;
                    height: 80vh;
                    background-color: #f4f4f4;   
                    
                }    
            .fling-minislide {width:100%; height:70vh; padding-bottom: 50%; overflow:hidden; position:relative; margin-left: 10%;}
            .fling-minislide img{ position:absolute; 
                animation:fling-minislide 20s infinite; opacity:0; width: 80%; height: 70vh; }

            @keyframes fling-minislide {25%{opacity:1;} 40%{opacity:0;}}
            .fling-minislide img:nth-child(3){animation-delay:3s;}
            .fling-minislide img:nth-child(2){animation-delay:6s;}
            .fling-minislide img:nth-child(1){animation-delay:9s;}

            </style>
        
            
        </section>
-->
        
        <section class="slider">
        <div id="slider">
		<ul>
		    <li><img src="resources/img/oferta1.jpg"/></li>
		    <li><img src="resources/img/oferta2.jpg"/></li>
            <li><img src="resources/img/oferta3.jpg"/></li>
	  	</ul>  
	</div>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
        </section>
        <style>

            .slider{
                 background-color: #f4f4f4;
            }    
            
        #slider {
          position: relative;
          overflow: hidden;
          margin: 0 auto;
        }

        #slider ul {
          position: relative;
          margin: 0;
          padding: 0;
          list-style: none;
        }

        #slider ul li {
          position: relative;
          display: block;
          float: left;
          width: 900px;
          height: 500px;
        }
        </style>
        
        <script>
        jQuery(document).ready(function ($) {
  setInterval(function () {
    $('#slider ul').animate({
      left: - slideWidth
    }, 700, function () {
      $('#slider ul li:first-child').appendTo('#slider ul');
      $('#slider ul').css('left', '');
    });
  }, 3000);
  
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('#slider').css({ width: slideWidth, height: slideHeight });
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
  $('#slider ul li:last-child').prependTo('#slider ul');

});    

        </script>
            
        

        <section class="section-form" id="contact">
            <div class="row">
                <h2>Jemi te lumtur nese e plotesoni kete pyetesor</h2>
            </div>
            <div class="row">
                <form method="post" action="contactform.php" class="contact-form">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="name">Emri</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="emri" id="name" placeholder="Emri juaj" required>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label for="find-us">Mbiemri</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="mbiemri" id="mbiemri" placeholder="Mbiemri juaj">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="email">Emaili</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="email" id="email" placeholder="Emaili juaj" required>
                        </div>
                    </div>
                       <div class="row">
                        <div class="col span-1-of-3">
                            <label>Te kenaqur?</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="radio" name="happy" id="check" value="Yes" checked> Yes
                            <input type="radio" name="happy" id="check" value="No"> No
                        </div>
                    </div>
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label>Ndonje koment</label>
                        </div>
                        <div class="col span-2-of-3">
                           <textarea name="koment" placeholder="Komenti juaj"></textarea>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" name="submit" value="DERGO!">
                        </div>
                    </div>
                    
                </form>
            </div>
            
        </section>

        <?php 
        include 'footer.php';
        ?>
         
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
        <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
        <script src="vendors/js/jquery.waypoints.min.js"></script>
        <script src="resources/js/script.js"></script>
  
    </body>

</html>