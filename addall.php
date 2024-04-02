<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    require_once("dbconnect.php");
    
    $Hold = 0;
    $HoldEmpty = 0;
    
    $sql = "SELECT Apt_Num FROM condo";
    $result = mysqli_query($db, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $Apt_Num = $row['Apt_Num'];
        
        $sql1 = "SELECT SUM(Pay_Amount) AS Cash_Amount FROM pay WHERE (Pay_Method = 'Cash' OR Pay_Method = 'Debit' OR Pay_Method = 'Credit') AND Apt_Num = '$Apt_Num'";
        $result1 = mysqli_query($db, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $Hold = $row1['Cash_Amount'];
        
        $sql2 = "SELECT SUM(Pay_Amount) AS Empty_Amount FROM pay WHERE Pay_Method = '' AND Apt_Num = '$Apt_Num'";
        $result2 = mysqli_query($db, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $HoldEmpty = $row2['Empty_Amount'];
        
        $Apt_Debt = $HoldEmpty - $Hold;
        
        $sql3 = "UPDATE condo SET Apt_Debt = $Apt_Debt WHERE Apt_Num = '$Apt_Num'";
        mysqli_query($db, $sql3);
    }
    
    header("location:apartment.php");
?>