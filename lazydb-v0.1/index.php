<?php include "header.php" ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<h2>Statistics of my Automation</h2>

<div class="jumbotron" style="color: darkgreen;">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<div class="row">
  <div class="column">
    <div class="card">
      <h3>Total Subdomains</h3><hr>
      <p>423534</p>
      <p style="font-size: 11px;"><span style="color: black;">Latest Update 2/31/2024 - 4:22 PM</span></p>
      <p><a href="">Download</a></p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>Total New Subdomains 24hr</h3><hr>
      <p>36</p>
      <p style="font-size: 11px;"><span style="color: black;">Latest Update 2/31/2024 - 4:22 PM</span></p>
    </div>
  </div>
  
</div>

</body>

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
        $query = "SELECT * FROM my_projects WHERE program_name='$client_query'";
        $result = mysqli_query($con,$query);

        // Plateform | Program | <Subdomains> Search Trick
              while($row = mysqli_fetch_assoc($result)){

          ?>
          <p>
            <span>Program Name:</span>
            <?php echo $row['program_name']; ?><br>
            <span>Plateform Name: </span>
            <?php echo $row['plateform_name']; ?><br>
            <span>Wildcard Domains:</span><a href=""> Click to View</a><br>
            <span>Subdomains:</span><a href=""> Click to View</a><br>
            <span>Out Of Scope Domains:</span><a href=""> Click to View</a><br>
          </p>

          <?php

        }

      }

      ?>
    </p>


    </form>
  </div>
<?php include "footer.php" ?>