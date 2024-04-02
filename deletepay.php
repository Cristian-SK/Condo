<?php

require_once("dbconnect.php");

if(isset($_GET['Pay_ID'])){
    $Pay_ID = $_GET['Pay_ID'];
    
    $sql = "DELETE FROM pay WHERE Pay_ID = ?";
    
    if($stmt = $db->prepare($sql)){
        
        $stmt->bind_param("i", $Pay_ID);
        
        if($stmt->execute()) {
            echo "Deleted Successfully!";
        }else{
            echo "ERROR!!!";
        }
    }
    
    $stmt->close();
    $db->close();
    header("location:addall.php");
}

?>