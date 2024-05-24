<?php require_once("include/connect.php"); ?>

<?php require_once("include/doctype.php"); ?>

<title> Vans PH | News </title>

<?php require_once("header.php"); ?>

<!-- end header -->
      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Latest News</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- news section -->
      <!--Main layout-->
      <div class="news_bg">
         <div class="container">
         <!--Section: News of the day-->
         <?php 
               
               $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : 1;

               
               $sel_stmt = "SELECT * FROM tbl_news";
               if ($news_id) {
                  $sel_stmt .= " WHERE news_id = :news_id";
               }

               
               $stmt = $conn->prepare($sel_stmt);
               if ($news_id) {
                  $stmt->bindParam(':news_id', $news_id, PDO::PARAM_INT);
               }
               $stmt->execute();

               
               $result = $stmt->fetchAll();

               
               $out = "";
               foreach ($result as $rows) {
                  $out .= "<section class='border-bottom pb-4 mb-5'>
                              <div class='row gx-5'>
                                    <div class='col-md-6 mb-4'>
                                       <div class='bg-image hover-overlay ripple shadow-2-strong rounded-5' data-mdb-ripple-color='light'>
                                          <img src='images/{$rows['news_img']}' class='img-fluid' />
                                          <a href='#!'>
                                                <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                                          </a>
                                       </div>
                                    </div>
                                    <div class='col-md-6 mb-4' style='background-color: rgba(255, 255, 255, 0.5);'>
                                       <h4><strong>{$rows['news_title']}</strong></h4>
                                       <p class='text-muted'><strong>{$rows['news_desc']}</strong></p>
                                       <p class='text-muted'><strong>Date: {$rows['news_dte']}</strong></p>
                                       <button type='button' data-mdb-button-init data-mdb-ripple-init class='btn btn-warning'>Read more</button>
                                    </div>
                              </div>
                           </section>";
               }
               echo $out;
            ?>

               
            </div>
         <!--Section: News of the day-->
         <div class='row gx-lg-5'>

            <div class='col-lg-4 col-md-6 mb-4 mb-lg-0'>
                           
               <div>
         <!--Section: Content-->
         <section>
         <?php 
    
            $default_news_id = 2; 

            
            $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : $default_news_id;

            $sel_stmt = "SELECT * FROM tbl_news WHERE news_id = :news_id"; 
            $stmt = $conn->prepare($sel_stmt);
            $stmt->bindParam(':news_id', $news_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $out = "";
            if ($result) {
               $out .= "<div class='bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4' data-mdb-ripple-color='light'>
                              <img src='images/{$result['news_img']}' class='img-fluid'
                                 alt='Hot Scoop for you' />
                           <a href='#!'>
                              <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                           </a>
                        </div>

                        <div class='row mb-3'>
                           <div class='col-6 text-end' style='background-color: rgba(255, 255, 255, 0.8); padding: 5px;'>
                              <u>{$result['news_dte']}</u>
                           </div>
                        </div>

                        <div class='text-container' style='background-color: rgba(255, 255, 255, 0.8); padding: 15px;'> <a href='' class='text-dark'>
                           <h5>{$result['news_title']}</h5>
                              <p>{$result['news_desc']}</p>
                           </a>
                        </div>
                     <hr />";
                  } else {
                     $out .= "<p>No news found for the provided news ID.</p>";
                  }
      
                  echo $out;
               ?>
               </div>
               </div>
               <!-- End news content -->

               <div class='col-lg-4 col-md-6 mb-4 mb-lg-0'>
                           
                           <div>
   <!--Section: Content-->
   <section>
   <?php 

      $default_news_id = 3; 

      
      $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : $default_news_id;

      $sel_stmt = "SELECT * FROM tbl_news WHERE news_id = :news_id"; 
      $stmt = $conn->prepare($sel_stmt);
      $stmt->bindParam(':news_id', $news_id);
      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $out = "";
      if ($result) {
         $out .= "<div class='bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4' data-mdb-ripple-color='light'>
                        <img src='images/{$result['news_img']}' class='img-fluid'
                           alt='Hot Scoop for you' />
                     <a href='#!'>
                        <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                     </a>
                  </div>

                  <div class='row mb-3'>
                     <div class='col-6 text-end' style='background-color: rgba(255, 255, 255, 0.8); padding: 5px;'>
                        <u>{$result['news_dte']}</u>
                     </div>
                  </div>

                  <div class='text-container' style='background-color: rgba(255, 255, 255, 0.8); padding: 15px;'> <a href='' class='text-dark'>
                     <h5>{$result['news_title']}</h5>
                        <p>{$result['news_desc']}</p>
                     </a>
                  </div>
               <hr />";
            } else {
               $out .= "<p>No news found for the provided news ID.</p>";
            }

            echo $out;
         ?>
         </div>
         </div>
            <!-- End news content -->

         <div class='col-lg-4 col-md-6 mb-4 mb-lg-0'>
                           
                           <div>
   <!--Section: Content-->
   <section>
   <?php 

      $default_news_id = 4; 

      
      $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : $default_news_id;

      $sel_stmt = "SELECT * FROM tbl_news WHERE news_id = :news_id"; 
      $stmt = $conn->prepare($sel_stmt);
      $stmt->bindParam(':news_id', $news_id);
      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $out = "";
      if ($result) {
         $out .= "<div class='bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4' data-mdb-ripple-color='light'>
                        <img src='images/{$result['news_img']}' class='img-fluid'
                           alt='Hot Scoop for you' />
                     <a href='#!'>
                        <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                     </a>
                  </div>

                  <div class='row mb-3'>
                     <div class='col-6 text-end' style='background-color: rgba(255, 255, 255, 0.8); padding: 5px;'>
                        <u>{$result['news_dte']}</u>
                     </div>
                  </div>

                  <div class='text-container' style='background-color: rgba(255, 255, 255, 0.8); padding: 15px;'> <a href='' class='text-dark'>
                     <h5>{$result['news_title']}</h5>
                        <p>{$result['news_desc']}</p>
                     </a>
                  </div>
               <hr />";
            } else {
               $out .= "<p>No news found for the provided news ID.</p>";
            }

            echo $out;
         ?>
         </div>
         </div>

               <!-- End news content -->

                           <div class='col-lg-4 col-md-6 mb-4 mb-lg-0'>
                           
               <div>
         <!--Section: Content-->
         <section>
         <?php 
    
            $default_news_id = 5; 

            
            $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : $default_news_id;

            $sel_stmt = "SELECT * FROM tbl_news WHERE news_id = :news_id"; 
            $stmt = $conn->prepare($sel_stmt);
            $stmt->bindParam(':news_id', $news_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $out = "";
            if ($result) {
               $out .= "<div class='bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4' data-mdb-ripple-color='light'>
                              <img src='images/{$result['news_img']}' class='img-fluid'
                                 alt='Hot Scoop for you' />
                           <a href='#!'>
                              <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                           </a>
                        </div>

                        <div class='row mb-3'>
                           <div class='col-6 text-end' style='background-color: rgba(255, 255, 255, 0.8); padding: 5px;'>
                              <u>{$result['news_dte']}</u>
                           </div>
                        </div>

                        <div class='text-container' style='background-color: rgba(255, 255, 255, 0.8); padding: 15px;'> <a href='' class='text-dark'>
                           <h5>{$result['news_title']}</h5>
                              <p>{$result['news_desc']}</p>
                           </a>
                        </div>
                     <hr />";
                  } else {
                     $out .= "<p>No news found for the provided news ID.</p>";
                  }
      
                  echo $out;
               ?>
               </div>
               </div>
               <!-- End news content -->
               <div class='col-lg-4 col-md-6 mb-4 mb-lg-0'>
                           
                           <div>
                     <!--Section: Content-->
                     <section>
                     <?php 
                
                        $default_news_id = 6; 
            
                        
                        $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : $default_news_id;
            
                        $sel_stmt = "SELECT * FROM tbl_news WHERE news_id = :news_id"; 
                        $stmt = $conn->prepare($sel_stmt);
                        $stmt->bindParam(':news_id', $news_id);
                        $stmt->execute();
            
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                        $out = "";
                        if ($result) {
                           $out .= "<div class='bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4' data-mdb-ripple-color='light'>
                                          <img src='images/{$result['news_img']}' class='img-fluid'
                                             alt='Hot Scoop for you' />
                                       <a href='#!'>
                                          <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                                       </a>
                                    </div>
            
                                    <div class='row mb-3'>
                                       <div class='col-6 text-end' style='background-color: rgba(255, 255, 255, 0.8); padding: 5px;'>
                                          <u>{$result['news_dte']}</u>
                                       </div>
                                    </div>
            
                                    <div class='text-container' style='background-color: rgba(255, 255, 255, 0.8); padding: 15px;'> <a href='' class='text-dark'>
                                       <h5>{$result['news_title']}</h5>
                                          <p>{$result['news_desc']}</p>
                                       </a>
                                    </div>
                                 <hr />";
                              } else {
                                 $out .= "<p>No news found for the provided news ID.</p>";
                              }
                  
                              echo $out;
                           ?>
                           </div>
                           </div>
                           <!-- End news content -->
   
                           <div class='col-lg-4 col-md-6 mb-4 mb-lg-0'>
                           
                           <div>
                     <!--Section: Content-->
                     <section>
                     <?php 
                
                        $default_news_id = 7; 
            
                        
                        $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : $default_news_id;
            
                        $sel_stmt = "SELECT * FROM tbl_news WHERE news_id = :news_id"; 
                        $stmt = $conn->prepare($sel_stmt);
                        $stmt->bindParam(':news_id', $news_id);
                        $stmt->execute();
            
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                        $out = "";
                        if ($result) {
                           $out .= "<div class='bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4' data-mdb-ripple-color='light'>
                                          <img src='images/{$result['news_img']}' class='img-fluid'
                                             alt='Hot Scoop for you' />
                                       <a href='#!'>
                                          <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                                       </a>
                                    </div>
            
                                    <div class='row mb-3'>
                                       <div class='col-6 text-end' style='background-color: rgba(255, 255, 255, 0.8); padding: 5px;'>
                                          <u>{$result['news_dte']}</u>
                                       </div>
                                    </div>
            
                                    <div class='text-container' style='background-color: rgba(255, 255, 255, 0.8); padding: 15px;'> <a href='' class='text-dark'>
                                       <h5>{$result['news_title']}</h5>
                                          <p>{$result['news_desc']}</p>
                                       </a>
                                    </div>
                                 <hr />";
                              } else {
                                 $out .= "<p>No news found for the provided news ID.</p>";
                              }
                  
                              echo $out;
                           ?>
                           </div>
                           </div>
                           <!-- End news content -->

                           
               </div>

               <div class="product_main">        
               <div class="col-md-12">
                  <a class="read_more" href="addnews.php">Add More News?</a>
               </div>
               </div>
         </section>
         <!--Section: Content-->

         <!-- Pagination -->
         <nav class="my-4" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
               <li class="page-item">
               <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
               </li>
               <li class="page-item"><a class="page-link" href="#">1</a></li>
               <li class="page-item active" aria-current="page">
               <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
               </li>
               <li class="page-item"><a class="page-link" href="#">3</a></li>
               <li class="page-item">
               <a class="page-link" href="#">Next</a>
               </li>
            </ul>
         </nav>
         </div>
            </div>   
         <!--Main layout-->
      <!-- end news section -->
      <?php require_once("footer.php"); ?>

      <?php require_once("include/js.php"); ?>
   </body>
</html>

