<?php
    session_start();
    include_once 'userheader.php';
    require_once("dbconnect.php");

    // Get the unique values from the Apt_Num column
    $aptNumQuery = "SELECT DISTINCT Apt_Num FROM pay";
    $aptNumResult = mysqli_query($db, $aptNumQuery);
    $aptNumOptions = '';
    while ($row = mysqli_fetch_assoc($aptNumResult)) {
        $aptNum = $row['Apt_Num'];
        $aptNumOptions .= "<option value=\"$aptNum\">$aptNum</option>";
    }

    $search_query = "";
    $selected_apt_num = "";
    if (isset($_GET['q'])) {
        $search_query = $_GET['q'];
        $selected_apt_num = $_GET['apt_num'];
        
        if (!empty($selected_apt_num)) {
            $sql = "SELECT * FROM pay WHERE Apt_Num = '$selected_apt_num' AND (Pay_Concept LIKE '%$search_query%' OR Pay_Method LIKE '%$search_query%' OR Pay_Date LIKE '%$search_query%')";
        } else {
            $sql = "SELECT * FROM pay WHERE Pay_Concept LIKE '%$search_query%' OR Pay_Method LIKE '%$search_query%' OR Pay_Date LIKE '%$search_query%'";
        }
    } else {
        $sql = "SELECT * FROM pay";
    }

    $result = mysqli_query($db, $sql);
?>

<center>
    


</center>

<form action="" method="get" class="d-flex justify-content-end align-items-center">
  <div class="d-flex">
    <select class="form-select me-2 mt-1" name="apt_num">
      <option value="">Select Apt_Num</option>
      <?php echo $aptNumOptions; ?>
    </select>
    <input class="form-control me-2 mt-1" type="search" placeholder="Search" aria-label="Search" name="q" value="<?php echo htmlspecialchars($search_query); ?>">
  </div>
  <button class="btn btn-primary text-black search-button" type="submit">Search</button>
</form>



<center>
  <div class="rounded-table-container">
    <div class="tablestyle">
      <table class="table rounded-table">
        <thead>
          <tr>
            <th>Aparment</th>
            <th>Concept</th>
            <th>Description</th>
            <th>Method</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Modify</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?php echo $row['Apt_Num'] ?></td>
              <td><?php echo $row['Pay_Concept'] ?></td>
              <td><?php echo $row['Pay_Description'] ?></td>
              <td><?php echo $row['Pay_Method'] ?></td>
              <td><?php echo $row['Pay_Amount'] ?></td>
<td><?php echo $row['Pay_Date'] ?></td>
<td>
<button class="btn">
<a href="editpay.php?Pay_ID=<?php echo $row['Pay_ID'] ?>">
<span class="material-icons">edit</span>
</a>
</button>
</td>
<td>
<button class="btn">
<a href="Deletepay.php?Pay_ID=<?php echo $row['Pay_ID'] ?>">
<span class="material-icons">delete</span>
</a>
</button>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>

  </div>
</center>

    
   <div class="pdf-button-container">
  <div class="float-buttons">
    <button type="button" class="btn btn-primary btn-lg"><a href="paymentpage.php" class="text-black">Make a Payment</a></button>
    <button type="button" class="btn btn-primary btn-lg"><a href="paymentcharge.php" class="text-black">Make a Charge</a></button>
    <button type="button" class="pdf-button btn btn-primary btn-lg">
      <a href="table_payment.php?q=<?php echo urlencode($search_query); ?>&apt_num=<?php echo urlencode($selected_apt_num); ?>" class="text-black">Make a PDF</a>
    </button>
  </div>
</div>



</div>