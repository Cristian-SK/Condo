<?php
    require_once("dbconnect.php");
    

    if(isset($_POST['submit'])){
        if(empty($_POST['User_Name']) || empty($_POST['User_Last']) || empty($_POST['User_Sex']) || empty($_POST['User_Email']) ||
        empty($_POST['User_Tel']) || empty($_POST['User_Alt_Tel']) || empty($_POST['User_UsName']) || empty($_POST['User_Password']) || empty($_POST['User_Comment']))
        {
            echo 'Please Fill in the Blanks';
        }
        else
        {
            $User_Name = $_POST['User_Name'];
            $User_Last = $_POST['User_Last'];
            $User_Sex = $_POST['User_Sex'];
            $User_Email = $_POST['User_Email'];
            $User_Tel = $_POST['User_Tel'];
            $User_Alt_Tel = $_POST['User_Alt_Tel'];
            $User_UsName = $_POST['User_UsName'];
            $User_Password = hash('sha512', $_POST['User_Password']);
            $User_Comment = $_POST['User_Comment'];
            
            $sql = " INSERT INTO user (User_Name, User_Last, User_Sex, User_Email,User_Tel,User_Alt_Tel,User_UsName,User_Password,User_Comment)
            VALUES('$User_Name', '$User_Last', '$User_Sex', '$User_Email','$User_Tel','$User_Alt_Tel','$User_UsName','$User_Password','$User_Comment')";
            $result = mysqli_query($db,$sql);
            
            if($result){
                header("location:userinfo.php");
            }
            else{
                echo 'Please Check Query';
            }
        }
        
    }
    else
    {
        header("location:apartment.php");
    }

?>