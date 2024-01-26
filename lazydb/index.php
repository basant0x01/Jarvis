<?php include "header.php" ?>
<div class="jumbotron" style="background-color: lightblue;color: green;">

  <div class="grid-container">
    <div class="grid-item">New Subdomains 24/hr: 22</div>
    <div class="grid-item">XXXXXXXXXXXXXXXXXXXXX</div>
    <div class="grid-item">XXXXXXXXXXXXXXXXXXXXX</div>  
    <div class="grid-item">Total Subdomains: 273234</div>
    <div class="grid-item">XXXXXXXXXXXXXXXXXXXXX</div>
    <div class="grid-item">XXXXXXXXXXXXXXXXXXXXX</div>  
    <div class="grid-item">XXXXXXXXXXXXXXXXXXXX</div>
    <div class="grid-item">XXXXXXXXXXXXXXXXXXXX</div>
    <div class="grid-item">XXXXXXXXXXXXXXXXXXXX</div>  
  </div>

  <style type="text/css">
    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto;
    }
    .grid-item {
      padding: 1px;
      font-size: 17px;
      text-align: center;
    }
  </style>

  <style>

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  color: black;
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
  <h5>Please filter based on your [ Subdomain | Project & Platforms ] </h5>
    <form action="" method="POST">
      <input style="width: 30%;height: 30px;" type="text" placeholder="Search your requirements.." name="search">
      <button style="width: 8%;height: 30px;" type="submit"><i class="fa fa-search"></i></button>
    <p>
      <?php
      if (isset($_POST['search'])) {

        $client_query = $_POST['search'];
        $query = "select * from projects WHERE project_name='$client_query'";
        $result = mysqli_query($con,$query);

        // Plateform | Program | <Subdomains> Search Trick
              while($row = mysqli_fetch_assoc($result)){

          ?>
          <p>
            <span>Platform Name:</span>
            <?php echo $row['platform_name']; ?><br>
            <span>Project Name: </span>
            <?php echo $row['project_name']; ?><br>
            <span>Subdomains:</span><a href=""> Click to View</a><br>
          </p>

          <?php

        }

      }

      ?>
    </p>


    </form>
  </div>
<?php include "footer.php" ?>