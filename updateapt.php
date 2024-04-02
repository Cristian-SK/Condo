<?php
    require_once("dbconnect.php");
    
    //Check connection
    if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
    }
    
    //Get data from form
    $Apt_ID = $_POST['Apt_ID'];
    $Apt_Num = $_POST['Apt_Num'];
    $Apt_Name = $_POST['Apt_Name'];
    $Apt_Last = $_POST['Apt_Last'];
    $Apt_Postal = $_POST['Apt_Postal'];
    $Apt_Sex = $_POST['Apt_Sex'];
    $Apt_Email = $_POST['Apt_Email'];
    $Apt_Tel = $_POST['Apt_Tel'];
    $Apt_Alt_Tel = $_POST['Apt_Alt_Tel'];
    $Apt_Quota_Mon = $_POST['Apt_Quota_Mon'];
    $Apt_Com_Sec = $_POST['Apt_Com_Sec'];
      
        //Update record in database
    $sql = "UPDATE condo SET Apt_Num='$Apt_Num', Apt_Name='$Apt_Name', Apt_Last='$Apt_Last', Apt_Postal='$Apt_Postal', Apt_Sex='$Apt_Sex', Apt_Email='$Apt_Email', Apt_Tel='$Apt_Tel',Apt_Alt_Tel='$Apt_Alt_Tel', Apt_Quota_Mon='$Apt_Quota_Mon', Apt_Com_Sec='$Apt_Com_Sec' WHERE Apt_ID=$Apt_ID";
        
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