<?php
	session_start();
	include_once 'userheader.php';
	require_once("dbconnect.php");

	$search_query = "";
if (isset($_GET['q'])) {
    $search_query = $_GET['q'];
    $sql = "SELECT * FROM condo WHERE Apt_Num LIKE '%$search_query%' OR Apt_Name LIKE '%$search_query%' OR Apt_Last LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM condo";
}
	$result = mysqli_query($db, $sql);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="styles.css">
<style>
    #formContainer {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #4896B4;
      padding: 20px;
      border: 1px solid #ccc;
    }

    #formContainer.show {
      display: block;
    }
</style>

<div class="usercontent">
<center>
<form action="" method="get" class="d-flex justify-content-end align-items-center">
  <div class="d-flex">
    <input class="form-control me-2 mt-1" type="search" placeholder="Search" aria-label="Search" name="q" value="<?php echo htmlspecialchars($search_query); ?>">
  </div>
  <button class="btn btn-primary text-black search-button" type="submit">Search</button>
</form>
<div class="tablestyle">
<table class="table rounded-table">
  <thead>
    <tr>
      <th>Aparment</th>
      <th>Name</th>
      <th>Last Name</th>
      <th>Postal</th>
      <th>Sex</th>
      <th>Email</th>
      <?php if($_SESSION['User_Type'] == 'Admin'): ?>
        <th>Phone</th>
      <?php endif; ?>
      <th>Alt. Phone</th>
      <th>Quota</th>
      <th>Dedt</th>
      <th>Comment</th>
      <th>Modify</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['Apt_Num'] ?></td>
        <td><?php echo $row['Apt_Name'] ?></td>
        <td><?php echo $row['Apt_Last'] ?></td>
        <td><?php echo $row['Apt_Postal'] ?></td>
        <td><?php echo $row['Apt_Sex'] ?></td>
        <td><?php echo $row['Apt_Email'] ?></td>
        <?php if($_SESSION['User_Type'] == 'Admin'): ?>
          <td><?php echo $row['Apt_Tel'] ?></td>
        <?php endif; ?>
        <td><?php echo $row['Apt_Alt_Tel'] ?></td>
        <td><?php echo $row['Apt_Quota_Mon'] ?></td>
        <td><?php echo $row['Apt_Debt'] ?></td>
        <td><?php echo $row['Apt_Com_Sec'] ?></td>
        <td>
          <button class="btn">
            <a href="editapt.php?Apt_ID=<?php echo $row['Apt_ID'] ?>">
              <span class="material-icons">edit</span>
            </a>
          </button>
        </td>
        <td>
          <button class="btn">
            <a href="deleteapt.php?Apt_ID=<?php echo $row['Apt_ID']?>">
              <span class="material-icons">delete</span>
            </a>
          </button>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
        <div>
        <button id="showFormButton" class="btn" style="font-size: 25px;" ><span class="material-symbols-outlined">request_quote</span></button>
            <div id="formContainer" class="rounded">
            <form id="myForm" action="apt_quota.php" method="POST">
                <!-- Your form elements go here -->
                <label class="h3 fw-bold">Form to set a description to all the apartments.</label>
                <hr class="my-4">
                <label for="Description">Type a Description:</label>
                <input type="text" id="Pay_Description" name="Pay_Description" required>
                
                
                <button class="btn" style="font-size: 25px;" name=" submit"><a href="apt_quota.php">
                <span class="material-symbols-outlined">request_quote</span>
                </button>
            </form>
            </div>



            <button class="btn" ><a href="apartmentinfo.php">
                <span class="material-icons" style="font-size: 50px;">add_circle</span></a>
            </button>
            <button class="btn"><a href="table_apartment.php?q=<?php echo urlencode($search_query); ?>"><span class="material-symbols-outlined">picture_as_pdf</span></a></button>
        
        </div>
</center>

</div>
<script src="hoverform.js"></script>
