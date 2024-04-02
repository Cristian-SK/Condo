<?php
    require_once("dbconnect.php");
    

    if(isset($_POST['submit'])){
        if(empty($_POST['Apt_Num'])|| empty($_POST['Apt_Name']) || empty($_POST['Apt_Last']) || empty($_POST['Apt_Postal']) || empty($_POST['Apt_Sex']) || empty($_POST['Apt_Email']) ||
        empty($_POST['Apt_Tel']) || empty($_POST['Apt_Alt_Tel']) || empty($_POST['Apt_Quota_Mon']) || empty($_POST['Apt_Com_Sec']))
        {
            echo 'Please Fill in the Blanks';
        }
        else
        {
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
            
            $sql = " INSERT INTO condo (Apt_Num, Apt_Name, Apt_Last,Apt_Postal,Apt_Sex, Apt_Email,Apt_Tel,Apt_Alt_Tel,Apt_Quota_Mon,Apt_Com_Sec)
            VALUES('$Apt_Num','$Apt_Name','$Apt_Last','$Apt_Postal','$Apt_Sex','$Apt_Email','$Apt_Tel','$Apt_Alt_Tel','$Apt_Quota_Mon','$Apt_Com_Sec')";
            $result = mysqli_query($db,$sql);
            
            if($result){
                header("location:apartment.php");
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