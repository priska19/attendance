<?php 
//this includes the ssession file, this file contains code that start/resumes a ssession
//by having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website
include_once 'includes/session.php' ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    
    <title>Attendance - <?php echo $title; ?></title>
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">IT Converence</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewattendee.php">Attendee</a>
        </li>    
      </ul>
      <div class="navbar-nav mr-auto">          
        <?php 
        if(!isset($_SESSION['user_id'])){ ?>
          <a class="nav-link" href="login.php">Login</a>
        <?php } else { ?>
          <span>Hello <?php echo $_SESSION['username']; ?>! </span>
          <a class="nav-link" href="logout.php">Logout</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>
<br/>