<?php
	session_start();
	
		include_once 'userheader.php';
        require_once("dbconnect.php");
    if (!$db) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieve data from database
	$User_ID = $_GET['User_ID'];
	$sql = "SELECT * FROM user WHERE User_ID = $User_ID";
	$result = mysqli_query($db, $sql);
    
    

	// Display data in form for updating
	if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result);
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="styles.css">
<div class="usercontent">

<center>
    <div class="userdtl">
    <form method="post" action="userupdate.php">
        <fieldset>
        <input type="hidden" name="User_ID" value="<?php echo $row['User_ID'];?>">
            <label for="first-name">Enter User First Name: 
                <input id="first-name" name="User_Name" type="text" placeholder="first-name" value="<?php echo $row['User_Name']; ?>"  />
            </label>
            <label for="last-name">Enter User Last Name: 
                <input id="last-name" name="User_Last" type="text" placeholder="last-name" value="<?php echo $row['User_Last']; ?>"  />
            </label>
            <label for="email">Enter User Email: 
                <input id="email" name="User_Email" type="text" placeholder="Email" value="<?php echo $row['User_Email']; ?>" />
            </label>

            <label for="sexo">Enter User Sex: </label>
            <label for="male"><input id="male" type="radio" name="User_Sex" value="Male" class="inline" value="<?php echo $row['User_Sex']; ?>"/> Male</label>
            <label for="female"><input id="female" type="radio" name="User_Sex" value="Female" class="inline" value="<?php echo $row['User_Sex']; ?>" /> Female</label>

            
            
            <label for="phone">Enter User Phone: 
                <input id="phone" name="User_Tel" type="text" placeholder="Phone #" value="<?php echo $row['User_Tel']; ?>"  />
            </label>
            <label for="phonealt">Enter User Phone: 
                <input id="phonealt" name="User_Alt_Tel" type="text" placeholder="Alt. Phone #"  value="<?php echo $row['User_Alt_Tel']; ?>"/>
            </label>
            <label for="username">Enter User User-Name: 
                <input id="username" name="User_UsName" type="text" placeholder="username" value="<?php echo $row['User_UsName']; ?>"/>
            </label>
            <label for="password">Enter User Pasword: 
                <input id="password" name="User_Password" type="text" placeholder="password" value="<?php echo $row['User_Password']; ?>"/>
            </label>
            
            <label for="bio">Provide User bio:
                <textarea id="bio" name="User_Comment" rows="3" cols="30" placeholder="..."value="<?php echo $row['User_Comment']; ?>"></textarea>
            </label>
            <button name="update" type="submit" value="Update"class="btn"><span class="material-icons2">add_circle</span></button>
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