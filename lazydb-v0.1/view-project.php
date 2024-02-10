<?php include "header.php" ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="">

<?php

  $project_id = $_GET['project_id'];

  $query = "SELECT * FROM my_projects WHERE project_id=$project_id";
  $result = mysqli_query($con,$query);

        // Plateform | Program | <Subdomains> Search Trick
              while($row = mysqli_fetch_assoc($result)){
      ?>

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

<div class="grid-project" style="padding: 15px;">
 <h2><?php echo $row['program_name']; ?></h2>
 <p>You can customize and add new Modules. <a href="">More Modules</a></p>
</div>

<div class="row">
<!--   <div class="column">
    <div class="card">
      <h3>Wordpress / PHP</h3>
      <p style="font-size: 11px;">Latest Scan: 1/30/2024 - 12:21 PM</p>
      <p>New Subdomains: 21</p>
      <p>Total Subdomains: 3324</p>
      <p><a href="">Download</a></p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>Ports & Services</h3>
      <p style="font-size: 11px;">Latest Scan Report: 1/30/2024 - 12:21 PM</p>
      <p>Masscan report: <a href="">Download</a> </p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Nuclei Scanner</h3>
      <p style="font-size: 11px;">Latest Scan Report: 1/30/2024 - 12:21 PM</p>
      <p><a href="">Download</a></p>
    </div>
  </div> -->
  
  <div class="column">
    <div class="card">
      <h3 style="background-color: white;padding: 13px;">Content Discovery</h3>
      <p style="font-size: 13px;">Scan Type: Normal</p>
      <p style="font-size: 11px;font-family: IMPACT;">Latest Scan Report: 7/28/2024 - 4:06 AM</p>
      <p><a style="padding: 10px;" href="">Download</a> | <a style="padding: 10px;" href="">Settings</a></p>
    </div>
  </div>
</div>

</body>


























<!-- ----------------------------------------->


      <?php

        }

    ?>

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