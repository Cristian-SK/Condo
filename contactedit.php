<?php
    session_start();
    require_once("dbconnect.php");
    
    include_once 'userheader.php';
    
    if (!$db) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieve data from database
	$Info_ID = $_GET['Info_ID'];
	$sql = "SELECT * FROM information WHERE Info_ID = $Info_ID";
	$result = mysqli_query($db, $sql);
    
    

	// Display data in form for updating
	if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result);
    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<div class="frontcontent">
    
    <form method="post" action="updcon.php">
    <input type="hidden" name="Info_ID" value="<?php echo $row['Info_ID'];?>">
        <fieldset>
            <label for="Location">Change Location:
                <input id="Location" name="Location" type="text" placeholder="Number" value="<?php echo $row['Location']; ?>">
            </label>
            
 
            <label for="Tel">Change Owner Phone: 
                <input id="Tel" name="Tel" type="text" placeholder="Phone #" value="<?php echo $row['Tel']; ?>" />
            </label>
            
            <label for="email">Change Email: 
                <input id="Email" name="Email" type="email" placeholder="Email"  value="<?php echo $row['Email']; ?>"/>
            </label>
            <center>
            <button name="update" type="submit" value="Update" class="btn"><span class="material-icons" style="font-size: 50px;">update</span></button>
            </center>
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