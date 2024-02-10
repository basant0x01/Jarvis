<?php include "header.php" ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="jumbotron" style="background-color: lightblue;color: green;">

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #45a049;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  color: black;
}
</style>
</head>
<body>

<h3>Create New Project</h3>

<div class="container">
  <form action="" method="POST">
    <label for="prgram_name">Program Name</label>
    <input type="text" id="prgram_name" name="prgram_name" placeholder="Program name..">

    <label for="Plateform">Plateform</label>
    <select id="Plateform" name="plateform_name">
      <option value="Yeswehack">Yeswehack</option>
      <option value="Hackerone">Hackerone</option>
      <option value="Bugcrowd">Bugcrowd</option>
    </select>

    <label for="wildcard-domains">WildCard Domains</label>
    <textarea id="wildcard-domains" name="wildcard_domain" placeholder="Paste your wildcard domains if availabe.." style="height:100px"></textarea>

    <label for="subdomains">Subdomains</label>
    <textarea id="subdomains" name="subdomain" placeholder="Paste your Domains / Subdomains.." style="height:200px"></textarea>

    <input type="file" name="subdomains-file"><br>

    <label for="outofscope">Out of scope Domains</label>
    <textarea id="outofscope" name="outofscope_domain" placeholder="Paste your out of scope domains if availabe.." style="height:100px"></textarea>

    <input type="submit" value="create_project" name="create_project"><br>
  </form>
</div>

 <?php

if (isset($_POST['create_project'])) {

$project_id = "";
$prgram_name = $_POST['prgram_name'];
$plateform_name = $_POST['plateform_name'];
$wildcard_domain = $_POST['wildcard_domain'];
$subdomain = $_POST['subdomain'];
$outofscope_domain = $_POST['outofscope_domain'];

$query = "INSERT INTO my_projects VALUES ('$project_id','$prgram_name', '$plateform_name', '$wildcard_domain', '$subdomain', '$outofscope_domain')";

if (mysqli_query($con,$query)) {
  echo "New project successfully created!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);

 }



?> 




</body>
</html>

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

<div class="search-container" style="background-color: #f8f2ec;padding: 0px;">
  <h5></h5>
   


    </form>
  </div>
<?php include "footer.php" ?>