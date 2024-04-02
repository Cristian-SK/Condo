<?php
	session_start();
	
		include_once 'userheader.php';

?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="styles.css">
<div class="usercontent">

<center>
    <div class="userdtl">
    <form method="post" action="userinsert.php">
        <fieldset>
            <label for="first-name">Enter First Name: 
                <input id="first-name" name="User_Name" type="text" placeholder="first-name"  />
            </label>
            <label for="last-name">Enter Last Name: 
                <input id="last-name" name="User_Last" type="text" placeholder="last-name"  />
            </label>
            <label for="email">Enter Email: 
                <input id="email" name="User_Email" type="text" placeholder="Email"  />
            </label>

            <label for="sexo">Enter Sex: </label>
            <label for="male"><input id="male" type="radio" name="User_Sex" value="Male" class="inline" /> Male</label>
            <label for="female"><input id="female" type="radio" name="User_Sex" value="Female" class="inline" /> Female</label>

            
            
            <label for="phone">Enter Phone: 
                <input id="phone" name="User_Tel" type="text" placeholder="Phone #"  />
            </label>
            <label for="phonealt">Enter Phone: 
                <input id="phonealt" name="User_Alt_Tel" type="text" placeholder="Alt. Phone #"  />
            </label>
            <label for="username">Enter User-Name: 
                <input id="username" name="User_UsName" type="text" placeholder="username" />
            </label>
            <label for="password">Enter Pasword: 
                <input id="password" name="User_Password" type="text" placeholder="password"/>
            </label>
            
            <label for="bio">Provide bio:
                <textarea id="bio" name="User_Comment" rows="3" cols="30" placeholder="..."></textarea>
            </label>
            <button name="submit" type="submit" class="btn"><span class="material-icons2">add_circle</span></button>
        </fieldset>
      </form>
    </div>
    
</center>

</div>