<?php
    require_once("dbconnect.php");
    
    //Check connection
    if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
    }
    
    //Get data from form
    $Info_ID = $_POST['Info_ID'];
    $Location = $_POST['Location'];
    $Tel = $_POST['Tel'];
    $Email = $_POST['Email'];
      
        //Update record in database
    $sql = "UPDATE information SET Location='$Location', Tel='$Tel', Email='$Email' WHERE Info_ID=$Info_ID";
        
        if(mysqli_query($db, $sql)){
            echo "Record update successfully";
            header("location:contact2.php");
        }
        else{
            echo "Error updating record: " . mysqli_error($db);
        }
        //Close database connection
        mysqli_close($db)
?>