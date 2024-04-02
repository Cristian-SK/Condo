<?php

require_once("dbconnect.php");


if(isset($_POST['submit'])){
    if(empty($_POST['Apt_Num']) || empty($_POST['Pay_Concept']) || empty($_POST['Pay_Description']) || empty($_POST['Pay_Amount'])) {
        echo 'Please Fill in the Blanks';
    } else {
        $Apt_Num = $_POST['Apt_Num'];
        $Pay_Concept = $_POST['Pay_Concept'];
        $Pay_Description = $_POST['Pay_Description'];
        $Pay_Amount = $_POST['Pay_Amount'];
        
        
        //DateTime
        date_default_timezone_set('America/Puerto_Rico');
        $Pay_Date = date('Y-m-d H:i:s');
        
        
        $stmt = $db->prepare("INSERT INTO pay (Apt_Num, Pay_Concept, Pay_Description, Pay_Amount, Pay_Date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $Apt_Num, $Pay_Concept, $Pay_Description, $Pay_Amount, $Pay_Date);
        $result = $stmt->execute();
        
        header("location:addall.php");
        exit();
    }
} else {
    header("location:payment.php");
    exit();
}