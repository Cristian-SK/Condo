<?php
	session_start();
		include_once 'userheader.php';
    require_once("dbconnect.php");
    
    if (!$db) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieve data from database
	$Pay_ID = $_GET['Pay_ID'];
	$sql = "SELECT * FROM pay WHERE Pay_ID = $Pay_ID";
	$result = mysqli_query($db, $sql);
    

    if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="styles.css">
<div class="usercontent">
<center>
    <div class="aptinf" >
    <form class="row g-3" method="post" action="updatepay.php">
    <input type="hidden" name="Pay_ID" value="<?php echo $row['Pay_ID'];?>">
        <fieldset>
            
            <div class="cal-md=8">
                <label for="Apt_Num" class="form-label">Content</label>
                <input type="text" class="form-control" name="Apt_Num" placeholder="" value="<?php echo $row['Apt_Num']?>"></input>
            </div>
        <?php
            if(!empty($row['Pay_Method'])){
            $Pay_Method = $row['Pay_Method'];
        ?>
        <select name="Pay_Method" class="form-select" aria-label="Default select example">
            <option selected>Select the Apartment</option>
            <option value="Cash" <?php if($Pay_Method == 'Cash') echo 'selected'; ?>>Cash</option>
            <option value="Credit Card" <?php if($Pay_Method == 'Credit Card') echo 'selected'; ?>>Credit Card</option>
            <option value="Debit Card" <?php if($Pay_Method == 'Debit Card') echo 'selected'; ?>>Debit Card</option>
            <!--Add more payment methods-->
        </select>
        <?php
            }   
        ?>
            <div class="cal-md=8">
                <label for="Pay_Concept" class="form-label">Content</label>
                <input type="text" class="form-control" name="Pay_Concept" placeholder="" value="<?php echo $row['Pay_Concept']?>"></input>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" name="Pay_Amount" value="<?php echo $row['Pay_Amount']?>" aria-label="Dollar amount (with dot and two decimal places)">
            </div>
        
            <div class="Description">
                <textarea class="form-control" value="<?php echo $row['Pay_Description']?>" name="Pay_Description" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            
            <button name="update" type="submit" value="Update" class="btn"><span class="material-icons">update</span></button>
        </fieldset>
      </form>
    <?php
	} else {
	    echo "0 results";
	}

	// Close database connection
	mysqli_close($db);
?>
    </div>
</center>






</div>