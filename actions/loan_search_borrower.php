<?php
// Include the database connection
require "../includes/db_conn.php";

// Get the search query from the AJAX request
$query = $_POST['query'];

// Create the SQL query to search for matching members
$sql = "SELECT * FROM members WHERE (lastname LIKE '%$query%' OR firstname LIKE '%$query%' OR middlename LIKE '%$query%' OR member_id LIKE '%$query%') AND status = 1";

// Execute the query and get the result
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
  // Loop through the results and display them as options
  while ($row = mysqli_fetch_assoc($result)) {
    $member_id = $row['member_id'];
    $member_name = $row['lastname'] . ", " . $row['firstname'] . " " . substr($row['middlename'], 0, 1) . ".";
    ?>
    <div class="member-item" data-id="<?php echo $member_id; ?>" style="">
      <a class="m-1 member-name" type="button"><?php echo $member_name; ?></a>
    </div>
    <style type="text/css">
      .member-item:hover {
        color: black;

      }

      .member-name {
        text-decoration: none;
        color: black;
      }

    </style>

    <?php
  }
} else {
  // If there are no results, display a message
  echo "<div class='member-item'>No results found</div>";
}
?>
