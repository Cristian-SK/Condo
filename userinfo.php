<?php
    include_once 'userheader.php';
    require_once("dbconnect.php");

    $search_query = "";
    if (isset($_GET['q'])) {
        $search_query = $_GET['q'];
        $sql = "SELECT * FROM user WHERE User_Name LIKE '%$search_query%' OR User_Last LIKE '%$search_query%' OR User_Sex LIKE '%$search_query%' OR User_Email LIKE '%$search_query%' OR User_Tel LIKE '%$search_query%' OR User_Alt_Tel LIKE '%$search_query%' OR User_UsName LIKE '%$search_query%' OR User_Password LIKE '%$search_query%' OR User_Comment LIKE '%$search_query%'";
    } else {
        $sql = "SELECT * FROM user";
    }

    $result = mysqli_query($db, $sql);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<div class="usercontent">
    <center>
        <form action="" method="get" class="d-flex justify-content-end">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" value="<?php echo htmlspecialchars($search_query); ?>">
            <button class="btn-primary text-black" type="submit">Search</button>
        </form>
        <div class="paymentstyle">
    <div class="rounded-table-container">
      <table class="table rounded-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Sex</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Alt. Phone</th>
            <th>UserName</th>
            <th>Comment</th>
            <th>Modify</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?php echo $row['User_Name'] ?></td>
              <td><?php echo $row['User_Last'] ?></td>
              <td><?php echo $row['User_Sex'] ?></td>
              <td><?php echo $row['User_Email'] ?></td>
              <td><?php echo $row['User_Tel'] ?></td>
              <td><?php echo $row['User_Alt_Tel'] ?></td>
              <td><?php echo $row['User_UsName'] ?></td>
              <td><?php echo $row['User_Comment'] ?></td>
              <td>
                <button class="btn">
                  <a href="useredit.php?User_ID=<?php echo $row['User_ID'] ?>">
                    <span class="material-icons">edit</span>
                  </a>
                </button>
              </td>
              <td>
                <button class="btn">
                  <a href="deleteuser.php?User_ID=<?php echo $row['User_ID'] ?>">
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
        <div>
            <button class="btn" ><a href="userdetail.php">
            <span class="material-icons" style="font-size: 50px;">add_circle</span>
            </button>
        </div>
    </center>
</div>
