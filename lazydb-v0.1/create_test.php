<?php include "header.php" ?>

<div class="container">
  <form action="create_test.php" method="POST">
    <label for="prgram_name">Program Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your name..">
    <input type="submit" value="create">
   </form>
</div>


<?php
$name = $_POST['name'];
$query = "INSERT INTO names VALUES ('$name_id','$name')";

if (mysqli_query($con, $query)) {
  echo "New project successfully created";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


?>