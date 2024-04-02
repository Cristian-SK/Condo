<?php
	session_start();
		include_once 'userheader.php';
    require_once("dbconnect.php");
    
    if (!$db) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieve data from database
	$Apt_ID = $_GET['Apt_ID'];
	$sql = "SELECT * FROM condo WHERE Apt_ID = $Apt_ID";
	$result = mysqli_query($db, $sql);
    
    

	// Display data in form for updating
	if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="styles.css">
<div class="usercontent">
<center>
    <div class="aptinf" >
    <form method="post" action="updateapt.php">
    <input type="hidden" name="Apt_ID" value="<?php echo $row['Apt_ID'];?>">
        <fieldset>
            <label for="apt_num">Change Apartment Number:
                <input id="apt_num" name="Apt_Num" type="text" placeholder="Number" value="<?php echo $row['Apt_Num']; ?>">
            </label>
            
            <label for="first_name">Change Owner First Name: 
                <input id="first_name" name="Apt_Name" type="text" placeholder="first_name" value="<?php echo $row['Apt_Name']; ?>"  />
            </label>
            <label for="last_name">Change Owner Last Name: 
                <input id="last_name" name="Apt_Last" type="text" placeholder="last name" value="<?php echo $row['Apt_Last']; ?>" />
            </label>
            <label for="postal">Change Owner Mailing Address: 
                <input id="Apt_Postal" name="Apt_Postal" type="text" placeholder="postal" value="<?php echo $row['Apt_Postal']; ?>" />
            </label>
            
            <label for="sexo">Change Owner Sex: </label>
            <label for="male"><input id="Apt_Sex" type="radio" name="Apt_Sex" class="inline"value="<?php //echo $Apt_Sex; ?>" /> Male</label>
            <label for="female"><input id="Apt_Sex" type="radio" name="Apt_Sex" class="inline" value="<?php //echo $Apt_Sex?>" /> Female</label>

            
            <label for="email">Change Owner Email: 
                <input id="Apt_Email" name="Apt_Email" type="email" placeholder="Email"  value="<?php echo $row['Apt_Email']; ?>"/>
            </label>
            <label for="phone">Change Owner Phone: 
                <input id="phone" name="Apt_Tel" type="text" placeholder="Phone #" value="<?php echo $row['Apt_Tel']; ?>" />
            </label>
            <label for="phonealt">Change Owner Phone: 
                <input id="phonealt" name="Apt_Alt_Tel" type="text" placeholder="Alt. Phone #" value="<?php echo $row['Apt_Alt_Tel']; ?>" />
            </label>
            <label for="Quota">Quota: 
                <input id="quota" name="Apt_Quota_Mon" type="text" placeholder="Number quota" value="<?php echo $row['Apt_Quota_Mon']; ?>" />
            </label>
            
            <label for="bio">Change bio provided:
                <textarea id="bio" name="Apt_Com_Sec" rows="3" cols="30" placeholder="..." value="<?php echo $row['Apt_Com_Sec']; ?>"></textarea>
            </label>
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