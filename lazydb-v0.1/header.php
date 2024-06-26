<?php
  include "db.php"; /* DB Connection */
  session_start(); /* Starts the session */
  if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:login.php");
	  exit;
  }
?>

<!-- Show password protected content down here -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <title>Logged in</title>
  </head>

  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
            <li role="presentation"><a href="logout.php" role="button">Logout</a></li>
            <li><?php include "profile-dropdown.php";?></li>
          </ul>
        </nav>
        <h3 class="text-muted" style="color: #016628;">Welcome to the Lazy<span>DB</span></h3>
      </div>
      <tr></tr>
        <center>
          <ul class="nav nav-pills" style="padding-left: 14px;padding-bottom: 20px;">
            <li role="presentation" class="active"><li><?php include "dropdown.php";?></li></li>
            <!-- <li style="padding:6px;" role="presentation"><li><?php include "dropdown.php";?></li></li> -->
          </ul>
        </center>
