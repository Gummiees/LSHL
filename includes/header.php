<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Love Second Hand Life!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="css/main.css">
    <script src="smooth-scroll.js"></script>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php?id=1">PROFILE</a></li>
            <li><a href="register.php">REGISTER FIGURE</a></li>
            <li><a href="register_user.php">REGISTER USER</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form" role="search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="q">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
              <img src="images/nav.png" alt="Logo" class="nav-logo">
            </form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['q'])) {
    echo '<p class="error">You forgot to enter your first name.</p>';
  } else {
    $q = mysqli_real_escape_string($dbc, trim($_POST['q']));
    header("edit_user.php?id=$q");
  }
}
?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="content">