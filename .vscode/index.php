<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

    <!-- Title  -->
    <title>News Magazine  | Home</title>
    <link rel="icon" href="img/core-img/favicon.ico">

    <!--  Style CSS -->
    
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">    
    <script src="js/carousel.js" defer></script>
 
  
   
    <script src="js/jquery/jquery-2.2.4.min.js" defer></script>

    
    

</head>


<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "web_project");
    if ($conn -> connect_error) die("Connection failed: " . $conn->connect_error);
    $sql = "SELECT * FROM articles order by id desc limit 10";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    ?>


    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
    <header class="header_area">

        <div class="area"></div>

    </header>

    <!-- Logo Area -->
    <div class="top_header">
            <a href="index.php"><img src="img/core-img/logo.png" alt="logo"></a>
    </div>
          

    <!-- Middle Header Area -->
    <header class="main_header">
            <button class="dropbtn"><i class="fas fa-bars"></i></button>
                <div class="topnav">
                        <ul>
                            <li><a class="active" href="index.php">HOME</a></li>
                            <li><a href="#news">CATEGORY</a></li>
                            <li><a href="single_post.html">SINGLE POST</a></li>
                            <li><a href="#about">ABOUT US</a></li>
                            <li><a href="contact.html">CONTACT</a></li>
                        </ul>
                    </div>
                          <div class="search_container">
                            <form action="#">
                              <input type="text" placeholder="Search.." name="search">
                              <button><i class="fas fa-search" aria-hidden="true"></i></button>
                            </form>
                          </div>
                        
                </header>

    <!--END OF HEADER-->

    <!--CAROUSEL-->

    <section class="carousel">
            <div class="single_post" style="background-image: url(<?php echo $row['images']?>);">
                <div class="overlay">
                    <div class="single_post_content">
                        <div class="tags">
                            <a href="#">crypto</a>
                        </div>
                        <h3><a href="href=""><?php echo $row['title']?></a></h3>
                        <div class="date">
                            <a href="#"><?php echo $row['date_created']?></a>
                        </div>
                        <div class="text">
                            <p><?php echo $row['text']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php $row = $result->fetch_assoc();?>
            <div class="single_post" style="background-image: url(<?php echo $row['images']?>);">
                <div class="overlay">
                    <div class="single_post_content">
                        <div class="tags">
                            <a href="#">live</a>
                        </div>
                        <h3><a href="#" ><?php echo $row['title']?></a></h3>
                        <div class="date">
                            <a href="#"><?php echo $row['date_created']?></a>
                        </div>
                        <div class="text">
                            <p><?php echo $row['text']?></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php $row = $result->fetch_assoc();?>
            <div class="single_post" style="background-image: url(<?php echo $row['images']?>);">
               <div class="overlay">
                    <div class="single_post_content">
                        <div class="tags">
                            <a href="#">politics</a>
                        </div>
                        <h3><a href="#"><?php echo $row['title']?></a></h3>
                        <div class="date">
                            <a href="#"><?php echo $row['date_created']?></a>
                        </div>
                        <div class="text">
                            <p><?php echo $row['text']?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php $row = $result->fetch_assoc();?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
   
        
        <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
        </section>

    <!-- Latest News Marquee Area Start -->
    
    <div class="simple_container">
        <div class="marquee">
            <ul class="items" >
                    <li>
                        <a href="#"><span>10:40</span> The Facebook Live stream that could presage TV</a>
                    </li>
                    <li>
                        <a href="#"><span >11:02</span> Opinion: It's time to start talking about impeachment</a>
                    </li>
                    <li>
                        <a href="#"><span>12:37</span> Clinton aims to shore up Wisconsin with new TV ads</a>
                    </li>
                    <li>
                        <a href="#"><span>13:59</span> Trump signs tax bill before leaving for Mar-a-Lago</a>
                    </li>
            </ul>
        </div>
    </div>



    <!-- Main Content Area Start -->
    <section class="wrapper ">
        <div class="container">
               <!-- Gazette Welcome Post -->
                <div class="gazette_main_post">
                    <!-- Post Tag -->
                    <div class="gazette_tag">
                        <a href="#">Politices</a>
                    </div>
                    <div class="font_text">
                    <h2 ><?php echo $row['title']?></h2>
                    <p ><?php echo $row['date_created']?></p>
                </div>
                    <!-- Post Thumbnail -->
                    <div class="blog_post">
                        <img src="<?php echo $row['images']?>" style="width:70%; height:65%;" alt="post-thumb">
                    </div>

                    <div class="main_text">
                    <p><?php echo $row['text']?></span></p>
                    <button class="button button1" onclick="myFunction()" id="#myBtn">CONTINUE READING &#10095;</button>
                    </div>
                    <?php $row = $result->fetch_assoc();?>


                        <div class="post_share_btn_group">
                            <a href="#"><i class="fab fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>

                        </div>
                    </div>
                </div>
                <div class="column">

                        <!-- Side COlUMN -->
                        <div class="widget">
                            <div class="widget_title">
                                <h5>Don't miss</h5>
                            </div>

                            <div class="single_widget_post">
                                <div class="post_widget_thumb">
                                    <img src="img/blog-img/dm-1.jpg" alt="">
                                </div>
                                <div class="post_widget_content">
                                    <a href="#" >EU council reunites</a>
                                    <span>Dec 20, 2018</span>
                                </div>
                            </div>

                            <div class="single_widget_post">
                                <div class="post_widget_thumb">
                                    <img src="img/blog-img/dm-2.jpg" alt="">
                                </div>
                                <div class="post_widget_content">
                                    <a href="#" >A new way to travel </a>
                                    <span>Dec 20, 2018</span>
                                </div>
                            </div>

                            <div class="single_widget_post">
                                <div class="post_widget_thumb">
                                    <img src="img/blog-img/dm-3.jpg" alt="">
                                </div>
                                <div class="post_widget_content">
                                    <a href="#" >Why choose a bank?</a>
                                    <span>Dec 20, 2018</span>
                                </div>
                            </div>
                        </div>

                        <div class="advertisement">
                            <div class="widget_title">
                                <h5>Advert</h5>
                            </div>
                            <div class="advert_thumb ">
                                <a href="#"><img src="img/bg-img/add.png" alt=""></a>
                            </div>
                        </div>

                        <div class="subscribe_widget">
                            <div class="widget_title">
                                <h5>subscribe</h5>
                            </div>
                            <div class="subscribe_form">
                                <form action="#">
                                    <input type="email" name="email" id="subs_email" placeholder="Your Email">
                                    <button type="submit">subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>

        </section>



    <!-- TODAY'S POST-->
    <section class="wrapper2">
    <div class="todays_post">
        <div class="gazette_heading">
            <h4>today’s most popular</h4>
        </div>
        <!-- Single Today Post -->
    <div class="container">
        <div class="post_thumb">
            <img src="img/blog-img/2.jpg" style="width:100%; height:100%;" alt="">
        </div>
        <div class="post_content">
              <div class="gazette_tag">
                    <a href="#">News</a>
                </div>
                <h3><a href="#">$250-million mansion is most expensive</a></h3>
                <p>March 29, 2016</p>
                <div class="comments">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere.</p>
                </div>
        </div>
        </div>


            <!-- Single Today Post -->
         <div class="container">
        <div class="post_thumb">
            <img src="img/blog-img/3.jpg " style="width:92%; height:100%;" alt="">
        </div>
        <div class="post_content">
            <div class="gazette_tag">
                <a href="#">Life</a>
            </div>
            <h3><a href="#">Homeless man steals $350,000 </a></h3>
            <p>March 29, 2016</p>
           <div class="comments">

               <p>Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis. Aliquam finibus nulla quam, a iaculis justo finibus non. Suspendisse in fermentum nunc.</p>
          </div>
       </div>
       </div>
   </div>


</section>



    <!-- VIDEO -->
    <section class="video">
        <div class="video_container">
            <div class="post">
               <div class="single_video_post">
                   <div class="overlay">
                        <div class="video_post">
                            <img src="img/blog-img/4.jpg" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" ><i class="fa fa-play" ></i></a>
                        </div>
                        </div>
                        <h5><a href="#">Show suspended by PBS amid misconduct allegations</a></h5>
                    </div>


                    <div class="single_video_post">
                            <div class="video_post">
                            <img src="img/blog-img/5.jpg" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">Parents to Congress</a></h5>
                    </div>



                    <div class="single_video_post">
                            <div class="video_post">
                            <img src="img/blog-img/6.jpg" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" ><i class="fa fa-play"></i></a>
                        </div>
                        <h5><a href="#">Third Buy Alert for This “Millionaire Maker” Stock</a></h5>
                    </div>

                    <div class="single_video_post">
                            <div class="video_post">
                            <img src="img/blog-img/7.jpg" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" ><i class="fa fa-play"></i></a>
                        </div>
                        <h5><a href="#">The Chicago Mercantile Exchange is set to begin</a></h5>
                    </div>
            </div>
            <div class="post">

              <div class="single_video_post">
                    <div class="video_post">
                            <img src="img/blog-img/8.jpg" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" ><i class="fa fa-play"></i></a>
                        </div>
                        <h5><a href="#">Trading bitcoin futures</a></h5>
                    </div>

                <div class="single_video_post">
                        <div class="video_post">
                            <img src="img/blog-img/9.jpg" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" ><i class="fa fa-play" ></i></a>
                        </div>
                        <h5><a href="#">Are ‘Micro-Mansions’ the Next Big Thing?</a></h5>
                    </div>

                    <div class="single_video_post">
                            <div class="video_post">
                            <img src="img/blog-img/10.jpg" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" ><i class="fa fa-play"></i></a>
                        </div>
                        <h5><a href="#">McKinney’s target market</a></h5>
                    </div>

                    <div class="single_video_post">
                            <div class="video_post">
                            <img src="img/blog-img/11.jpg" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" ><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">Australian Property Prices Remain Flat</a></h5>
                    </div>
                    </div>
                </div>
            </section>



    <!-- FOOTER-->
    <footer class="footer_area " style="background-image: url(img/bg-img/c4.jpg);     ">
       <div id="overlay">
           <div class="container">
               <div class="single_footer">
                   <div class="footer_title">
                                <h4>Regions</h4>
                            </div>
                            <ul class="footer_menu">
                                <li><a href="#">U.S.</a></li>
                                <li><a href="#">Africa</a></li>
                                <li><a href="#">Americas</a></li>
                                <li><a href="#">Asia</a></li>
                                <li><a href="#">China</a></li>
                                <li><a href="#">Europe</a></li>
                                <li><a href="#">Middle</a></li>
                                <li><a href="#">East</a></li>
                                <li><a href="#">Opinion</a></li>
                            </ul>
                        </div>


                        <div class="single_footer">
                            <div class="footer_title">
                                <h4 >Fashion</h4>
                            </div>
                            <ul class="footer_menu">
                                <li><a href="#">Election 2018</a></li>
                                <li><a href="#">Nation</a></li>
                                <li><a href="#">World</a></li>
                                <li><a href="#">Our Team</a></li>
                            </ul>
                        </div>


                        <div class="single_footer">
                            <div class="footer_title">
                                <h4>Politics</h4>
                            </div>
                            <ul class="footer_menu">
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Markets</a></li>
                                <li><a href="#">Tech</a></li>
                                <li><a href="#">Luxury</a></li>
                            </ul>
                        </div>

                        <div class="single_footer">
                            <div class="footer_title">
                                <h4>Featured</h4>
                            </div>
                            <ul class="footer_menu">
                                <li><a href="#">Football</a></li>
                                <li><a href="#">Golf</a></li>
                                <li><a href="#">Tennis</a></li>
                                <li><a href="#">Motorsport</a></li>
                                <li><a href="#">Horseracing</a></li>
                                <li><a href="#">Equestrian</a></li>
                                <li><a href="#">Sailing</a></li>
                                <li><a href="#">Skiing</a></li>
                            </ul>
                        </div>

                        <div class="single_footer">
                            <div class="footer_title">
                                <h4>FAQ</h4>
                            </div>
                            <ul class="footer_menu">
                                <li><a href="#">Aviation</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Traveller</a></li>
                                <li><a href="#">Destinations</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Food/Drink</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">Partner Hotels</a></li>
                            </ul>
                        </div>


                        <div class="single_footer">
                            <div class="footer_title">
                                <h4>+More</h4>
                            </div>
                            <ul class="footer_menu">
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Arts</a></li>
                                <li><a href="#">Autos</a></li>
                                <li><a href="#">Luxury</a></li>
                            </ul>
                        </div>
                        </div>


                <!-- Bottom Footer Area -->
                <div class="bottom_footer">
                    <div class="copywrite_text">
                            <p>Copyright &copy; All rights reserved <i class="far fa-heart"></i>
                            </p>
                            </div>
                        </div>
                    </div>
    </footer>


</body>
</html>