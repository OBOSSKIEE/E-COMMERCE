<?php require_once("include/connect.php"); ?>

<?php require_once("include/doctype.php"); ?>

<title> Vans PH | Official Site | Free Shipping & Refunds</title>

   <?php require_once("header.php"); ?>

      <!-- banner -->

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="d-block w-100" src="images/wallpaper2.jpg" alt="First slide">
               <div class="carousel-caption d-none d-md-block">
                  <div class="text-bg">
                     <h1><span class="blodark">Vans</span><br>Never Stand Still</h1>
                     <p>The UltraRange™ Neo VR3. For everywhere, and any way you end up there.</p>
                     <a class="read_more" href="products.php">Explore Shop</a>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="images/wallpaper3.jpg" alt="Second slide">
               <div class="carousel-caption d-none d-md-block">
                  <div class="text-bg">
                     <h1><span class="blodark">Huge Sale</span><br>50% Off</h1>
                     <p>Fits for Kids</p>
                     <a class="read_more" href="products.php">Open Shop</a>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="images/wallpaper.jpg" alt="Third slide">
               <div class="carousel-caption d-none d-md-block">
                  <div class="text-bg">
                     <h1><span class="blodark">Mens</span><br>Shoes Collection</h1>
                     <p>New Trending</p>
                     <a class="read_more" href="products.php">Check Products</a>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>

      
      <!-- end banner -->
      <div class="col-sm-12 text-center">
						<h2 class="intros">It started with a simple idea: Create quality, well-designed products that I wanted myself.</h2>
					</div>
               <div class="row">
                     <div class="_img">
                        <figure><img src="images/vansmen.jpg"></figure>
                        <div class="desc">
                              <h2><a href="#">Shop Men's Collection</a></h2>
                        </div>
                     </div>
                     <div class="_img">
                        <figure><img src="images/vanwomens.jpg"></figure>
                        <div class="desc">
                              <h2><a href="#">Shop Women's Collection</a></h2>
                        </div>
                     </div>
                  </div>



      <!-- project section -->
      <div id="project" class="project">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               <?php 
                        $count_stmt = "SELECT COUNT(prod_id) AS test_count FROM tbl_prod";

                        // Prepare and execute the query
                        $stmt = $conn->prepare($count_stmt);
                        $stmt->execute();
                                          
                        // Fetch the result
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $test_count = $row['test_count'];
                    ?>
                  <div class="titlepage">
                     <h2>(<?php echo ($test_count); ?>) Total Featured Products</h2>
                  </div>
               </div>
            </div>
            <div class="row">
            <div class="product_main">
             
            <?php
               $sel_stmt = "SELECT * FROM tbl_prod";
               $stmt = $conn->query($sel_stmt);
               $stmt->execute();

               $result = $stmt->fetchAll();

               $out = "";
               foreach ($result as $rows) {
                  $prod_title = $rows['prod_title'];
                  $prod_price = $rows['prod_price'];
                  //$prod_img = $rows['prod_img'];

                  
                  $starRating = "";
                  $rating = $rows['prod_rate']; 
                  for ($i = 1; $i <= 5; $i++) {
                     if ($i <= $rating) {
                           $starRating .= "<i class='fa fa-star'></i>"; 
                     } else {
                           $starRating .= "<i class='fas fa-star-half-alt'></i>"; 
                     }
                  }

                  $out .= "<div class='project_box '>
                              <div class='dark_white_bg' ><img src='images/{$rows[3]}' alt='$prod_title'/></div>
                              <div class='star-rating'>
                                 <div class='star-rating'>Rating $starRating</div>
                                 <h3>$prod_title</h3>
                                 <h3>$$prod_price</h3>
                              </div>
                           </div>";
               }
               echo $out;
               ?>

              
               <div class="col-md-12">
                  <a class="read_more" href="products.php">See More</a>
               </div>
            </div>
            </div>
         </div>
      </div>
      <!-- end project section -->
      <!-- fashion section -->
      <div class="fashion">
         <img src="images/collection.jpg" alt="#"/>
      </div>
      <!-- end fashion section -->
      <!-- news section -->
      <div class="news">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               <?php 
                        $count_stmt = "SELECT COUNT(news_id) AS test_count FROM tbl_news";

                        // Prepare and execute the query
                        $stmt = $conn->prepare($count_stmt);
                        $stmt->execute();
                                          
                        // Fetch the result
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $test_count = $row['test_count'];
                    ?>
                  <div class="titlepage">
                     <h2>(<?php echo (($test_count)); ?>)Hot News</h2>
                  </div>
               </div>
            </div>
            <?php 
    // limiter
    $news_limit = 3;

    
    $sel_stmt = "SELECT * FROM tbl_news LIMIT :news_limit";
    $stmt = $conn->prepare($sel_stmt);
    $stmt->bindParam(':news_limit', $news_limit, PDO::PARAM_INT); // Bind the parameter as an integer
    $stmt->execute();

    $result = $stmt->fetchAll();

    $out = "";
    foreach ($result as $rows){
        $out.="<div class='row'>
                    <div class='col-md-12 margin_top40'>
                    <div class='row d-flex'>
                    <div class='row d-flex'>
                        <div class='col-md-5'>
                           <div class='news_img'>
                                 <figure><img class='img-fluid' src='images/{$rows['news_img']}'></figure>
                           </div>
                        </div>
                        <div class='col-md-7'>
                           <div class='news_text' style='padding-left: 20px;'>
                                 <h3>{$rows['news_title']}</h3>
                                 <span>{$rows['news_dte']}</span>
                                 <div class='date_like'>
                                    <span>Like </span><span class='pad_le'>Comment</span>
                                 </div>
                                 <p>{$rows['news_desc']}</p>
                           </div>
                        </div>
                     </div>

                     </div>
                    </div>
                </div>";
    }
    echo $out;
?>


            </div>
         </div>
      </div>
      <!-- end news section -->
      <!-- newslatter section -->
      <div  class="newslatter">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-5">
                  <h3 class="neslatter">Subscribe On Us</h3>
               </div>
               <div class="col-md-7">
                  <form class="news_form">
                     <input class="letter_form" placeholder=" Enter your email" type="text" name="Enter your email">
                     <button class="sumbit">Subscribe</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      
      <div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="images/brand-1.jpg" class="img-fluid" alt="#">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" alt="#">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-3.jpg" class="img-fluid" alt="#">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-4.jpg" class="img-fluid" alt="#">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-5.jpg" class="img-fluid" alt="#">
					</div>
				</div>
			</div>
		</div>

      <?php require_once("footer.php"); ?>

      <?php require_once("include/js.php"); ?>

   </body>
</html>

