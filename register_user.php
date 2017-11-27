<?php
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require ('mysqli_connect.php');
  $errors = array();
  if (empty($_POST['email'])) {
    $errors[] = 'You forgot to enter your email.';
  } else {
    $fn = mysqli_real_escape_string($dbc, trim($_POST['email']));
  }
  if (empty($_POST['pwd1']) || empty($_POST['pwd2'])) {
    $errors[] = 'You forgot to enter your password.';
  } else {
      if (strlen($_POST['pwd1']) < 5) {
        $errors[] = 'The password is too short.';
      } else if ($_POST['pwd1'] == $_POST['pwd2']) {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['pwd1']));
      } else {
        $errors[] = 'The passwords did not match.';
      }
  }
  if (empty($_POST['username'])) {
    $errors[] = 'You forgot to enter the username.';
  } else {
    if (5 > strlen($_POST['username'])) {
      $errors[] = 'Username is too short.';
    }else if (20 < strlen($_POST['username'])) {
      $errors[] = 'Username is too long.';
    } else {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['username']));
    }
  }
  if (empty($_POST['firstname'])) {
    $errors[] = 'You forgot to enter your first name.';
  } else {
    if (3 > strlen($_POST['firstname'])) {
      $errors[] = 'The first name is too short.';
    }else if (20 < strlen($_POST['firstname'])) {
      $errors[] = 'The first name is too long.';
    } else {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
    }
  }
  if (empty($_POST['lastname'])) {
    $errors[] = 'You forgot to enter your last name.';
  } else {
    if (3 > strlen($_POST['lastname'])) {
      $errors[] = 'The last name is too short.';
    }else if (40 < strlen($_POST['lastname'])) {
      $errors[] = 'The last name is too long.';
    } else {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    }
  }
  if (empty($_POST['telephone'])) {
    $errors[] = 'You forgot to enter your telephone.';
  } else {
    $pattern = "/^\d{9}$/";
    if (preg_match ($pattern, trim($_POST['telephone']))) {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['telephone']));
    }else {
      $errors[] = 'The telephone is invalid.';
    }
  }
  if (!empty($_POST['desc'])) {
    if (empty($_POST['desc']) <= 500) {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['desc']));
    } else {
      $errors[] = 'The description is too long.';
    }
  }
  $pattern = "/(https?:\/\/.*\.(?:png|jpg))/";
  if (preg_match ($pattern, trim($_POST['image']))) {
    if (trim($_POST['image']) <= 250) {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['image']));
    } else {
      $errors[] = 'The link image is too long.';
    }
  }else {
    $errors[] = 'The link is not an image.';
  }
 
  if (empty($errors)) {
    //must check if username is already taken.
  } else {
    echo '<h1>Error!</h1><p class="error">The following error(s) occurred:<br />';
    foreach ($errors as $msg) { // Print each error.
      echo " - $msg<br />\n";
    }
    echo '</p><p>Please try again.</p><p><br /></p>';
  }
}
?>
<form class="form-horizontal" action="register_user.php" method="post">
  <div class="row">
    <div class="col-sm-2 text-right" style="font-size: 1.5em;"><b>User info</b></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username*:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" minlength="5" maxlength="20" name="username" id="username" required placeholder="Enter the desired username (between 5 and 20 characters)" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email*:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email (between 5 and 60 characters)" required maxlength="60" minlength="5" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="firstname">First name*:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" minlength="3" maxlength="20" name="firstname" required id="firstname" placeholder="Enter your first name (between 3 and 20 characters)" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Last name*:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" minlength="3" maxlength="40" name="lastname" required id="lastname" placeholder="Enter your last name (between 3 and 40 characters)" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Telephone*:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" name="telephone" required id="telephone" placeholder="Enter your telephone (xxxxxxxxx)" maxlength="9" minlength="9" value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Description:</label>
    <div class="col-sm-10"> 
      <textarea rows="5" class="form-control" name="desc" id="desc" placeholder="Enter the desired description (max 500 characters)" maxlength="500" value="<?php if (isset($_POST['desc'])) echo $_POST['desc']; ?>"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="image">Profile Image link:</label>
    <div class="col-sm-10"> 
      <input type="url" class="form-control" name="image" id="image" placeholder="Enter the image url (max 250 characters)" maxlength="250" minlength="5" value="<?php if (isset($_POST['image'])) echo $_POST['image']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd1">Password*:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" minlength="5" name="pwd1" id="pwd1" required placeholder="Enter password (min 5 characters)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd2">Repeat password*:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" minlength="5" name="pwd2" id="pwd2" required placeholder="Repeat the password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
<?php
include ('includes/footer.html');
?>