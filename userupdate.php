<?php
    require_once("dbconnect.php");
    
    //Check connection
    if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
    }
    
    //Get data from form
    $User_ID = $_POST['User_ID'];
    $User_Name = $_POST['User_Name'];
    $User_Last = $_POST['User_Last'];
    $User_Sex = $_POST['User_Sex'];
    $User_Email = $_POST['User_Email'];
    $User_Tel = $_POST['User_Tel'];
    $User_Alt_Tel = $_POST['User_Alt_Tel'];
    $User_UsName = $_POST['User_UsName'];
    $User_Password = hash('sha512', $_POST['User_Password']);
    $User_Comment = $_POST['User_Comment'];
      
        //Update record in database
    $sql = "UPDATE user SET User_Name='$User_Name', User_Last='$User_Last', User_Sex='$User_Sex', User_Email='$User_Email',User_Tel='$User_Tel',User_Alt_Tel='$User_Alt_Tel',User_UsName='$User_UsName',User_Password='$User_Password',User_Comment='$User_Comment' WHERE User_ID=$User_ID";
        
        if(mysqli_query($db, $sql)){
            echo "Record update successfully";
            header("location:apartment.php");
        }
        else{
            echo "Error updating record: " . mysqli_error($db);
        }
        //Close database connection
        mysqli_close($db)
?>