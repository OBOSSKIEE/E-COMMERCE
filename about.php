<?php require_once("include/connect.php"); 
?>

<?php require_once("include/doctype.php"); ?>

<title> About PH | Vans </title>

   <?php require_once("header.php"); ?>

      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>About</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section -->
      <div class="about">
         <div class="container">
         <?php 
                  
                  $sel_stmt = "SELECT * FROM tbl_about";
                  $stmt = $conn->query($sel_stmt);
                  $stmt->execute();

                  $result = $stmt->fetchAll();

                  $out = "";
                  foreach ($result as $rows){
                     $out.="<div class='row'>
                        <div class='col-md-6 light-border'>
                           <div class='about_text' >
                              <h3>{$rows[1]}</h3>
                              <p>{$rows[2]}</p>
                              <button class='read_more mb-3' id='expandBtn'>Read More</a>
                           </div>
                        </div>
                        <div class='col-md-5'>
                           <div class='about_img'>
                              <figure><img src='images/{$rows[3]}' alt='' class='rounded-image'/></figure>                  
                           </div>
                           <div></div>
                        </div>
                     </div>";
                           }
                           echo $out;
                  ?>

         </div>
      </div>
      
      <?php require_once("footer.php"); ?>

      <?php require_once("include/js.php"); ?>
   </body>
</html>

