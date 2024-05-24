<?php require_once("include/connect.php"); ?>

<?php require_once("include/doctype.php"); ?>

<title> Vans PH | Products </title>

<?php require_once("header.php"); ?>

      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Featured Products</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- project section -->
      <div id="project" class="project">
            <section class="section-products">
         
                     <div class="container">
                           <div class="row">
                                 <!-- Single Product --> 
                                 <?php
                                    

                                    $sel_stmt = "SELECT * FROM tbl_prod";
                                    $stmt = $conn->query($sel_stmt);
                                    $stmt->execute();

                                    $result = $stmt->fetchAll();

                                    $out = "";
                                    foreach ($result as $rows) {
                                       $prod_title = $rows['prod_title'];
                                       $prod_price = $rows['prod_price'];
                                       $prod_oldprice = $rows['prod_oldprice'];
                                       $prod_discount = $rows['prod_discount'];
                                       //$prod_img = $rows['prod_img']; 
                                       
                                       $discount_html = "";
                                       if (!empty($prod_discount)) {
                                          $discount_html = "<span class='discount'>$prod_discount off</span>";
                                       }
                                       
                                       
                                       $starRating = "";
                                       $rating = $rows['prod_rate'];
                                       for ($i = 1; $i <= 5; $i++) {
                                          if ($i <= $rating) {
                                                $starRating .= "<i class='fa fa-star'></i>"; 
                                          } else {
                                                $starRating .= "<i class='fas fa-star-half-alt'></i>"; 
                                          }
                                       }
                                       
                                       $out .= "<div class='col-md-6 col-lg-4 col-xl-3'>
                                                   <div class='single-product'>
                                                      <div class='part-1'><img src='images/{$rows[3]}' alt='$prod_title'/>
                                                      $discount_html
                                                      <ul>
                                                            <li><a href='view.php'><img src='images/cart.png' alt='Cart'></a></li>
                                                            <li><a href='view.php'><img src='images/heart.png' alt='Favorites'></a></li>
                                                            <li><a href='view.php'><img src='images/add.png' alt='Add'></a></li>
                                                            <li><a href='view.php'><img src='images/share.png' alt='Share'></a></li>
                                                      </ul>
                                                      </div>
                                                      <div class='part-2'>
                                                            <div class='star-rating'>
                                                               <h3 class='product-title'>$prod_title</h3>
                                                               <div class='star-rating'>Rating $starRating</div>
                                                               <h4 class='product-old-price'>Old Price $$prod_oldprice</h4>
                                                               <h4 class='product-price'>Now $$prod_price</h4>
                                                            </div>
                                                      </div>
                                                   </div>
                                                </div>";
                                    }
                                    echo $out;
                                    ?>



                                 
                           </div>
                     </div>
               </section>
            <div class="product_main">        
               <div class="col-md-12">
                  <a class="read_more" href="addprod.php">Add Product</a>
               </div>
            
            </div>
         
      </div>
      <!-- end project section -->
      
      <?php require_once("footer.php"); ?>

      <?php require_once("include/js.php"); ?>

      
   </body>
</html>

