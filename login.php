<?php
	include_once('header.php');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css?v=3">
    <center>
    
    
	<section class="login">
		<form class="" method="post" action="login.cryp.php">
			<p>Username:<input type="text" name="username" placeholder="Username" /></p> 
			<p>Password:<input type="text" name="password" placeholder="Password" type="password" /></p>
            
			 <div class="circle-button-container">
                <button name="logbtn" type="submit" class="circle-button">
                    <span class="material-symbols-outlined">login</span>
                </button>
                <button name="back" class="circle-button"><a href='index.php'>
                    <span class="material-symbols-outlined">cancel</span></a>
                </button>
            </div>


            
		<?php 
			if(isset($_GET['error'])) { 
			echo "<p>Incorrect username or password</p>"; 
			}  
		?> 
		</form>
	</section>
    </center>
