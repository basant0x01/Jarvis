<?php include "header.php" ?>
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
  <form action="/action_page.php">
    <label for="fname">Program Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Project name..">

    <label for="Plateform">Plateform</label>
    <select id="Plateform" name="Plateform">
      <option value="Yeswehack">Yeswehack</option>
      <option value="Hackerone">Hackerone</option>
      <option value="Bugcrowd">Bugcrowd</option>
    </select>

    <label for="subject">Subdomains</label>
    <textarea id="subject" name="subject" placeholder="Paste your Domains / Subdomains.." style="height:200px"></textarea>

    <input type="file" name="subdomains-file"><br>

    <input type="submit" value="Create">
  </form>
</div>

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