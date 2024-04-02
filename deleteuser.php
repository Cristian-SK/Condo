<?php

require_once("dbconnect.php");

if(isset($_GET['User_ID'])){
    $User_ID = $_GET['User_ID'];
    
    $sql = "DELETE FROM user WHERE User_ID = ?";
    
    if($stmt = $db->prepare($sql)){
        
        $stmt->bind_param("i", $User_ID);
        
        if($stmt->execute()) {
            echo "Deleted Successfully!";
        }else{
            echo "ERROR!!!";
        }
    }
    
    $stmt->close();
    $db->close();
    header("location:apartment.php");
}

?>