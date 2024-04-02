<?php
    session_start();
    require_once("dbconnect.php");
    
    include_once 'header.php';
    
    $sql = "SELECT * FROM information";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result); // fetch the first row from the result set
    $Location = $row['Location']; // assign the Location value to a variable
    $Tel = $row['Tel']; // assign the Tel value to a variable
    $Email = $row['Email']; // assign the Email value to a variable
    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<div class="frontcontent">
    <section>
        <h1 class="section-header">Contact Us</h1>
        <h2 class="section-txt">Here are the ways you can get in contact with us:</h2>
        <div class="contact-wrapper">
            <div class="direct-contact-container">
                <ul class="contact-list">
                    <li class="list-item"><i class=""><span class="contact-text place"><?php echo $Location ?></span></i></li>
                    <li class="list-item"><i class=""><span class="contact-text phone"><a href="tel:1-313-323-2323" title="Give me a call"><?php echo $Tel ?></a></span></i></li>
                    <li class="list-item"><i class=""><span class="contact-text gmail"><a href="mailto:#" title="Send me an email"><?php echo $Email ?></a></span></i></li>
                </ul>
            </div>
        </div>
    </section>
</div>