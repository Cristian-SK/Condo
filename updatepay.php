<?php
    require_once("dbconnect.php");
    
    //Check connection
    if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
    }
        $old_amount = $_POST['Pay_Amount'];
    
        $Pay_ID = $_POST['Pay_ID'];
        $Apt_Num = $_POST['Apt_Num'];
        $Pay_Concept = $_POST['Pay_Concept'];
        $Pay_Description = $_POST['Pay_Description'];
        $Pay_Amount = $_POST['Pay_Amount'];
        $Pay_Method = $_POST['Pay_Method'];
        date_default_timezone_set('America/Puerto_Rico');
        $Pay_Date = date('Y-m-d H:i:s');
      
        $sql = "UPDATE pay SET Apt_Num='$Apt_Num', Pay_Concept='$Pay_Concept', Pay_Description='$Pay_Description', Pay_Amount='$Pay_Amount', Pay_Method='$Pay_Method', Pay_Date='$Pay_Date' WHERE Pay_ID=$Pay_ID";
        
        
        
        if(mysqli_query($db, $sql)){
            echo "Record update successfully";
            header("location:addall.php");
            
        }
        else{
            echo "Error updating record: " . mysqli_error($db);
        }
        //Close database connection
        mysqli_close($db)
?>