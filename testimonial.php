<?php require_once('include/connect.php'); ?>
<?php require_once('include/doctype.php'); ?>
<title> Vans PH | Testimonial </title>
   <?php require_once('header.php'); ?>

      <div class="blue_bg">
      <section>
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    
                    
                    <?php 
                        $count_stmt = "SELECT COUNT(test_id) AS test_count FROM tbl_testi";

                        // Prepare and execute the query
                        $stmt = $conn->prepare($count_stmt);
                        $stmt->execute();
                                          
                        // Fetch the result
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $test_count = $row['test_count'];
                    ?>
        
                <h2 class="mb-4 testimonials-heading"> Total of Testimonials (<?php echo (($test_count)); ?>)</h2>
                
                <p class="mb-4 pb-2 mb-md-5 pb-md-0 bg-secondary text-white larger-text">
                A heartfelt thumbs-ups from our happy customers or clients, showing that our product and services is the real deal. We trust-building treasures that help newcomers feel confident in your choice.
                </p>
                </div>
            </div>

            <?php
                $sel_stmt = "SELECT * FROM tbl_testi";
                $stmt = $conn->query($sel_stmt);
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach ($result as $rows) {
                    $testid = $rows['test_id'];

                    
                    $filledStars = "";
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rows['test_rate']) {
                            $filledStars .= "<i class='fa fa-star'></i>"; 
                        } else {
                            $filledStars .= "<i class='fas fa-star-half-alt'></i>"; 
                        }
                    }

                    echo "<div class='row d-flex justify-content-center'>
                                <div class='col-md-10'>
                                    <div class='card custom-outground'>
                                        <div class='card-body m-3 custom-background testimonial-card'>
                                            <div class='row'>";
                    if(!$rows[5]==null){
                        echo "<img src='images/{$rows[5]}' alt='$testid' style='width: 160px; height: auto; border-radius: 50%;'/>";
                    } else{
                        echo "<img src='images/default.png' alt='$testid' style='width: 160px; height: auto; border-radius: 50%;'/>";
                    }              

                    echo                      "<div class='col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0'>
                                                    
                                                </div>
                                                <div class='col-lg-8'>
                                                <div class='testi-color'>
                                                    <div class='star-rating'>
                                                        <p class='text-muted fw-light mb-4' style='color:black'>" . $rows['test_review'] . "</p>
                                                        <p class='fw-bold lead mb-2'><strong class='text-danger'>" . $rows['test_name'] . "</strong></p>
                                                        <div class='star-rating'>{$filledStars}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                }

                ?>




                       
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
            
            </section>
      </div>
      <!-- fashion section -->
      <div class="fashion">
         <img src="images/testi.jpg" alt="#"/>
      </div>
      <!-- end fashion section -->
      <?php require_once('footer.php'); ?>

      <?php require_once('include/js.php'); ?>
   </body>
</html>

