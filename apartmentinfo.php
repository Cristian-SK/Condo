<?php
	session_start();
		include_once 'userheader.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="styles.css">
<div class="usercontent">
<center>
    <div class="aptinf">
    <form method="post" action="insert.php">
        <fieldset>
            <label for="apt_num">Enter Available Apartment Number:
                <input id="apt_num" name="Apt_Num" type="text" placeholder="Number" >
            </label>
            
            <label for="first_name">Enter Owner First Name: 
                <input id="first_name" name="Apt_Name" type="text" placeholder="first_name"  />
            </label>
            <label for="last_name">Enter Owner Last Name: 
                <input id="last_name" name="Apt_Last" type="text" placeholder="last name"  />
            </label>
            <label for="postal">Enter Owner Mailing Address: 
                <input id="postal" name="Apt_Postal" type="text" placeholder="postal"  />
            </label>
            
            <label for="sexo">Enter Owner Sex: </label>
            <label for="male"><input id="male" type="radio" name="Apt_Sex" value="Male" class="inline" /> Male</label>
            <label for="female"><input id="female" type="radio" name="Apt_Sex" value="Female" class="inline" /> Female</label>

            
            <label for="email">Enter Owner Email: 
                <input id="email" name="Apt_Email" type="email" placeholder="Email"  />
            </label>
            <label for="phone">Enter Owner Phone: 
                <input id="phone" name="Apt_Tel" type="text" placeholder="Phone #"  />
            </label>
            <label for="phonealt">Enter Owner Phone: 
                <input id="phonealt" name="Apt_Alt_Tel" type="text" placeholder="Alt. Phone #"  />
            </label>
            <label for="Quota">Quota: 
                <input id="quota" name="Apt_Quota_Mon" type="text" placeholder="Number quota" />
            </label>
            
            <label for="bio">Provide a bio:
                <textarea id="bio" name="Apt_Com_Sec" rows="3" cols="30" placeholder="..."></textarea>
            </label>
            <button name="submit" type="submit" class="btn"><span class="material-icons2">add_circle</span></button>
        </fieldset>
      </form>
    </div>
</center>






</div>