<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "dbconnect.php";

$sql = "SELECT DISTINCT Apt_Num, Apt_Quota_Mon FROM condo";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Rows returned: " . mysqli_num_rows($result) . "<br>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Processing row: " . $row['Apt_Num'] . "<br>";

        $Pay_Concept = "Monthly Quota!";
        
        $newPayDescription=$_POST['Pay_Description'];
        
        $Pay_Description = $newPayDescription;
        $Pay_Amount = $row['Apt_Quota_Mon'];

        //DateTime
        date_default_timezone_set('America/Puerto_Rico');
        $Pay_Date = date('Y-m-d H:i:s');

        $Apt_Num = $row['Apt_Num'];

        $stmt = $db->prepare("INSERT INTO pay (Apt_Num, Pay_Concept,Pay_Description, Pay_Amount, Pay_Date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $Apt_Num, $Pay_Concept,$Pay_Description, $Pay_Amount, $Pay_Date);
        $stmt->execute(); 

    }
        header("location:addall.php");
        exit();
} else {
    echo "No rows returned.<br>";
}

header("location:payment.php");
exit();
?>