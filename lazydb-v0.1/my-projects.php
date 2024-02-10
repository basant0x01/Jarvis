<?php include "header.php" ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="projects">

<h4 style="text-align: right;"><a style="text-decoration: none;" href="new-project.php">Create New Projects</a></h4>

<div class="search-project" style="background-color: #f8f2ec;padding: 15px;">
  <h5>Please filter based on your Program </h5>
    <form action="" method="POST">
      <input style="width: 30%;height: 30px;" type="text" placeholder="Search your program.." name="search">
      <button style="width: 8%;height: 30px;" type="submit"><i class="fa fa-search"></i></button>
    </form><br>

  <h4>My bugbounty Programs </h4>

  <table class="table table-hover">

  <table class="table" style="font-size: 13px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Program Name</th>
      <th scope="col">Plateform Name</th>
      <th scope="col">Visibility</th>
    </tr>
  </thead>

  <?php

        $query = "SELECT * FROM my_projects";
        $result = mysqli_query($con,$query);

        // Plateform | Program | <Subdomains> Search Trick
              while($row = mysqli_fetch_assoc($result)){
      ?>

          <tbody>
            <tr>
              <th scope="row"><?php echo $row['project_id']; ?></th>
              <td><a style="text-decoration: none;" href="view-project.php?project_id=<?php echo $row['project_id']; ?>"><?php echo $row['program_name'];?></a></td>
              <td><a style="background-color: black;color: white;padding: 5px;text-decoration: none;" href=""><?php echo $row['plateform_name']; ?></a></td>
              <td>Private</td>
            </tr>
          </tbody>


  <?php

        }


  ?>

</table>

<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 8px;
  font-size: 20px;
  text-align: center;
}
.grid-item a{
  text-decoration: none;
}
</style>


<style>
.container {
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>

<div class="search-container" style="background-color: #f8f2ec;padding: 15px;">
  <h5> </h5>


</div>
<?php include "footer.php" ?>