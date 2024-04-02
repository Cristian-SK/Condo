<?php

require_once("dbconnect.php");

if(isset($_GET['Apt_ID'])){
    $Apt_ID = $_GET['Apt_ID'];
    
    $sql = "DELETE FROM condo WHERE Apt_ID = ?";
    
    if($stmt = $db->prepare($sql)){
        
        $stmt->bind_param("i", $Apt_ID);
        
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