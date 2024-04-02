<?php
	session_start();
		include_once 'userheader.php';
        
    require_once("dbconnect.php");
    $sql2 = " SELECT * FROM pay";
    $result2 = mysqli_query($db,$sql2);
    
    $sql1 = " SELECT DISTINCT Apt_Num FROM condo";
    $result1 = mysqli_query($db,$sql1);
    
    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="styles.css">
<div class="usercontent">
<center>
    <div class="container mt-5">
        <h1>Charge Form</h1>
    <form class="row g-3" method="post" action="insertcharge.php">
        <select name="Apt_Num" class="form-select" aria-label="Default select example">
            <option selected>Select the Apartment</option>
            <?php
                while($row = mysqli_fetch_array($result1)){
                    $Apt_Num = $row['Apt_Num'];
            ?>
            <option value="<?php echo $Apt_Num ?>"><?php echo $Apt_Num?></option>
            <?php
                }
            ?>
        </select>
        
        
        <div class="cal-md=8">
            <label for="Pay_Concept" class="form-label">Content</label>
            <input type="text" class="form-control" name="Pay_Concept" Placeholder="Type in the concept..."></input>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" name="Pay_Amount" aria-label="Dollar amount (with dot and two decimal places)">
        </div>
        
        <div class="Description">
            <textarea class="form-control" placeholder="Leave a description here..." name="Pay_Description" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
        </div>
        
        <div>
            <button name="submit" type="submit" class="btn"><span class="material-icons2">add_circle</span></button>
        </div>
      </form>
    </div>
</center>


  </body>