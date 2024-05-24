<?php 

require_once('connect.php');
$fname = $_POST['fname'];
$rate = $_POST['rates'];
$msg = $_POST['message'];

    if(isset($fname)){
        
        $insertQry = "INSERT INTO tbl_testi(test_name,test_rate,test_review)VALUES(?,?,?)";
        $stmt = $conn->prepare($insertQry);
        $stmt->execute([$fname,$rate,$msg]);

        echo json_encode(['status' => 'Success', 'message' => 'Recorded Successfully']);
    
       
    }

?>